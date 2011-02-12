#!/bin/sh

ssh -L localhost:3306:localhost:3306 mysqltunnel@homeless.ewalds.ca "while true; do echo 'Tunnelling mysql'; sleep 30; done"

