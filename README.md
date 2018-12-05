# TYPO3 OPUS-Integration

Diese TYPO3-Extension ermöglicht es in OPUS gepflegte Publikationslisten über
die von OPUS bereitgestellte Schnittstelle zum Export von Publikationslisten in
die eigene TYPO3-Installation einzubinden. Die Extension stellt hierfür ein auf
Fluid Styled Content basiertes Inhaltselement bereit.

## Anforderungen

* OPUS muss für den Export von Publikationslisten konfiguriert sein. Siehe
  hierzu http://www.opus-repository.org/userdoc/features/publist.html.
* Auf dem Webserver muss PHP mit cURL-Unterstützung installiert sein.

## Installation

Die Extension muss wie jede andere TYPO3-Extension installiert werden. Da die
Extension nicht über das offizielle TYPO3-Extension-Repository (TER) verfügbar
ist, kann sie auf folgende Arten installiert werden:

* **GitHub**: `git clone https://github.com/hfuonlineservices/hfu-opus.git`
* **Composer**: Use `composer require hfuonlineservices/hfu-opus`.

## Vorbereitung: statisches TypoScript-Template einbinden

Die Extension liefert ein statisches TypoScript-Template mit, das eingebunden
werden muss:

1. Auf die Root-Seite (root page) der Website wechseln.
2. In das **Template Modul** wechseln und im Dropdown die Option _Info/Modify_
   auswählen.
3. Auf den Link **Vollständigen Template-Datensatz bearbeiten** klicken und
   anschließend in den Tab _Enthält_ wechseln.
4. Aus der Liste *Verfügbare Objekte* im Abschnitt *Statische Templates
   einschließen (aus Erweiterungen)* den Eintrag **OPUS-Integration
   (hfu_opus)** auswählen.
5. Speichern und Schließen.

## Konfiguration

Damit die Einbindung der OPUS-Publikationslisten funktioniert muss die URL zum
OPUS-Server hinterlegt werden. Hierfür in das Setup des
**Root-TypoScript-Templates** folgende Zeile einfügen (URL bitte anpassen): 

```
plugin.tx_hfu_opus.settings.baseUrl = http://example.org/opus4/export/index/publist/role/persons/number/
```

*Hinweis*:
Die URL kann vom obigen Beispiel abweichen! Lautet die URL zum Export einer
Publikationsliste als HTML-Snippet
`http://example.org/opus4/export/index/publist/role/persons/number/musterfrau`
so muss die in TypoScript einzutragende URL 
`http://example.org/opus4/export/index/publist/role/persons/number/` lauten
(ohne die OPUS-Nummer des Sammlungseintrages `musterfrau`).

## Verwendung

Nach erfolgreicher Installation steht im Backend ein neues Inhaltselement
**OPUS-Publikationsliste** zur Verfügung. Es ist im Wizard für neue Inhalte im
Reiter *Besondere Elemente* zu finden.

Innerhalb des Inhaltselements muss in das Feld **OPUS-Schlüssel** die 
OPUS-Nummer des Sammeleintrags eingefügt werden.