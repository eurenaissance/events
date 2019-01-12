FROM postgres:9.6.8

# Inspired by https://github.com/appropriate/docker-postgis

RUN apt-get update \
      && apt-get install -y --no-install-recommends \
           postgresql-9.6-postgis-2.3 \
           postgresql-9.6-postgis-2.3-scripts \
      && rm -rf /var/lib/apt/lists/*

RUN mkdir -p /docker-entrypoint-initdb.d
COPY ./initdb-postgis.sh /docker-entrypoint-initdb.d/postgis.sh
