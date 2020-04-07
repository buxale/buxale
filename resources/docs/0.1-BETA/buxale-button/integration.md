# Implementierung des Buttons

---

- [Einbau der Snippets](#snippets)
- [Erstelle einen API Token](#apitoken)
- [Implementierung des Buttons](#implementierung)

<a name="snippets"></a>
## Snippets einbauen
> {info} Solltest du ein CMS benutzen kannst du gerne bei Problemen den Support kontaktieren.

Kopiere diesen Code in den `<head>` Bereich deiner Website:

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
## API Token erstellen

> {info} Der API Token ist ein einzigartiger Schlüssel, der deinen Checkout identifiziert und absichert.

Klicke in unserer Platform im Menü auf API:
![API Menu](/img/docs/menu_point_api.png)

Und danach einfach auf den Button "Neuen API Key generieren":
![API Key Generate](/img/docs/api_generate_key.png)

Der Code wird dir dann angezeigt. <b>Speichere ihn gut, er erscheint nur einmalig.</b>

<a name="implementierung"></a>
## Button implementieren

Der Button selber kann an jeder Stelle im `<body>` deiner Webseite stehen. Kopiere dazu einfach folgenden Code in deiner Seite:


```html
<buxale-button
      api_token="DEIN_API_TOKEN_HIER"
      success_url="https://app.buxale.io"
      color="teal"
      cancel_url="https://app.buxale.io"
      amount="15" />
```

`DEIN_API_TOKEN_HIER` muss gegen den API Token, den du im voherigen Schritt erzeug hast getauscht werden.  

Die anderen Parameter zur Anpassung des Buttons erklären wir [hier](/{{route}}/{{version}}/buxale-button/button-api). 
