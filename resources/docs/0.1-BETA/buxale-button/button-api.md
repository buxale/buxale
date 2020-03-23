# Overview

---

- [Overview](#overview)

<a name="overview"></a>
## Überblick über die Parameter
> {info} Wir haben diese Plattform in Rahmen eines Hackathons bin in 48h aus dem Boden gestampft. Bitte habt Nachsicht was den Umfang der Dokumentation angeht.

Folgende Parameter sind verfügbar. Erklärung dazu folgt weiter unten.
```json5
{
    buttonText: {
      required: false,
      type: String,
      default: "Checkout mit buxale"
    },
    color: {
      required: false,
      default: 'teal'
    },
    amount: {
      required: true,
      type: Number
    },
    success_url: {
      type: String,
      required: true
    },
    cancel_url: {
      type: String,
      required: true
    },
    api_token: {
      type: String,
      required: true
    },
    ref_id: {
      type: String,
      required: false
    }
  }
```
