# Integration des Buttons

---

- [Einbau der Snippets](#snippets)
- [Erstelle einen API Token](#apitoken)
- [Implementierung des Buttons](#implementierung)

<a name="snippets"></a>
## Einbau der Snippets
> {info} Solltest du ein CMS benutzen kannst du gerne bei Problemen den Support kontaktieren.

Kopiere diesen Code in deinen `<head>` Bereich deiner Webseite

```html
  <script src="https://js.buxale.io/js/app.js"></script>
  <link href="https://js.buxale.io/css/app.css" rel="stylesheet" />
```

Das sieht dann etwa so aus:

```html
<head>
  ....
    <title>Frische Frisur - Gutscheine</title>
    <script src="https://js.buxale.io/js/app.js"></script>
    <link href="https://js.buxale.io/css/app.css" rel="stylesheet" />
</head>
```

<a name="apitoken"></a>
## Erstelle einen API Token

> {info} Der API Token ist ein einzigartiger Schlüssel, der deinen Checkout als eben den deinen identifiziert.

Klicke in unserer Platform im Menü auf API:
![API Menu](/img/docs/menu_point_api.png)

Und danach Klicke einfach auf den Button "Neuen API Key generieren"
![API Key Generate](/img/docs/api_generate_key.png)

Der Code wird dir dann angezeigt. <b>Speichere ihn gut, er erscheint nur einmalig</b>

<a name="implementierung"></a>
## Implementierung des Buttons

Der Button selber kann an jeder Stelle im `<body>` deiner Webseite stehen. Dazu kopiere einfach folgenden Code in deiner Seite.


```html
<buxale-button
      api_token="DEIN_API_TOKEN_HIER"
      success_url="https://app.buxale.io"
      color="teal"
      cancel_url="https://app.buxale.io"
      amount="15" />
```

Den API Token, den du im letzten Schritt erzeugt hast, muss gegen `DEIN_API_TOKEN_HIER` getauscht werden.

Die anderen Parameter zur Anpassung deines Buttons erklären wir <a href="">hier</a>. 
