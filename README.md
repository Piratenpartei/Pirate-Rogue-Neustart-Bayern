# Pirate-Rogue - LTW18

WordPress Theme für die Landtagswahl 2018 in Bayern basierend auf
[Pirate-Rogue](https://github.com/Piratenpartei/Pirate-Rogue) (xwolf).

## Lokale Entwicklung

1. ZIP herunterladen: https://github.com/Piratenpartei/Pirate-Rogue/archive/master.zip
2. In Verzeichnis `pirate-rogue` entpacken
3. `docker-compose up -d`

### Release erstellen

1. Versionsnummer in [`pirate-rogue-ltw18-child/style.css`](pirate-rogue-ltw18-child/style.css) eintragen
2. `git add pirate-rogue-ltw18-child/style.css && git commit -m "release" && git tag <version>`
3. Versionsnummer auf die nächste Snapshot-Version setzten
4. `git add pirate-rogue-ltw18-child/style.css && git commit -m "set next development version" && git push --tags && git push`
