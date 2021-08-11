# AVENGERS, GET READY !

## Installation steps

1. Symlink your Docker containers configuration
```bash
ln -s docker-compose.yml.dist docker-compose.yml
```

2. Build your Docker containers
```bash
dc build
```

3. Install project
```bash
make install
```

4. Init db
```bash
make db
```

4. Have fun !
