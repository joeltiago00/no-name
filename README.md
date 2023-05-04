# No Name (yet...)

#### TODO:: write project description

<br>

### 🐳 Building containers

To build app just run:
```
docker-compose up -d
```

To enter inside container run:
```
docker-compose exec app bash
```

If you need enter in container as root run:
```
docker-compose exec -uroot app bash
```

To power off container run:
```
docker-compose down
```
<br>
<hr>

### 🧰 Installing dependencies
###### ps: Make sure if you are inside the container to install dependencies.

To install all dependencies just run:
```
composer install
```
<br>
<hr>

### 🛠 Pre Commit Script

###### ps: Works only out of the container

To make first enable run: 
```
cd src
cp ./pre-commit.disable ../.git/hooks/pre-commit
chmod +x .git/hooks/pre-commit
```

To disable pre commit run:
```
mv ../.git/hooks/pre-commit ../.git/hooks/pre-commit-disable
```

To enable again run:
```
mv ../.git/hooks/pre-commit-disable ../.git/hooks/pre-commit
```
