terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 4.0"
    }
  }
}

# Configure the AWS Provider
provider "aws" {
  region = "eu-west-3"
}

resource "aws_vpc" "vpc_cloudy" {
  cidr_block = "172.31.0.0/16"
}

resource "aws_subnet" "subnet_cloudy" {
  vpc_id            = aws_vpc.vpc_cloudy.id
  cidr_block        = "172.31.10.0/24"
  availability_zone = "eu-west-3"
}

resource "aws_network_interface" "node1" {
  subnet_id   = aws_subnet.subnet_cloudy.id
  private_ips = ["172.16.10.100"]
}

resource "aws_network_interface" "node2" {
  subnet_id   = aws_subnet.subnet_cloudy.id
  private_ips = ["172.16.10.200"]
}

resource "aws_instance" "node1" {
  ami           = "ami-002ff2c881c910aa8" # eu-west-3
  instance_type = "t2.micro"

  network_interface {
    network_interface_id = aws_network_interface.node1.id
    device_index         = 0
  }

  credit_specification {
    cpu_credits = "unlimited"
  }
}

resource "aws_instance" "node2" {
  ami           = "ami-002ff2c881c910aa8" # eu-west-3
  instance_type = "t2.micro"

  network_interface {
    network_interface_id = aws_network_interface.node2.id
    device_index         = 0
  }

  credit_specification {
    cpu_credits = "unlimited"
  }
}