#!/bin/bash
set -e

# The doc specifies that the extension should not be enabled on Posgresql specific table
# That's why we create the extension and database at container startup.
# One should not delete the created database or extensions would be lost.
for DB in mobilisation_eu mobilisation_eu_test; do
	echo "Loading PostGIS extensions into $DB"

    psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" -c "CREATE DATABASE $DB"

	psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$DB" <<-EOSQL
        -- Enable PostGIS (includes raster)
        CREATE EXTENSION IF NOT EXISTS postgis;
EOSQL
done

