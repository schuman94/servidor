#!/bin/bash
psql -h localhost -U datos -d datos < datos.sql

# Hay que darle permiso de ejcución con: chmod a+x crear.sh