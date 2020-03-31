# Button API

---

- [Button API](#overview)

<a name="overview"></a>   

Folgende Parameter sind verfügbar:
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
