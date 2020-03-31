# Voucher speichern

---

- [Voucher speichern](#overview)

<a name="overview"></a>
## Einen Voucher speichern

### Authorization
Bearer Token, siehe [Headers](/{{route}}/{{version}}/buxale-button/integration)

### Endpoint

| Method | URI   | Headers |
| : |   :-   |  :  |
| POST | /api/vouchers | Accept : application/json |
| | | Authorization : Bearer `{apiKey - token}`|

### Data Params
```javascript
{
	"code": {code}, // string, required, unique
	"value": {value}, // decimal, required
	"meta": {meta}, // json

	"beneficiary_company": {beneficiary_company}, // string, required
	"beneficiary_name": {beneficiary_name}, // string, required
	"beneficiary_street": {beneficiary_street}, // string, required
	"beneficiary_street_no": {beneficiary_street_no}, // string, required
	"beneficiary_zip": {beneficiary_zip}, // string, required
	"beneficiary_city": {beneficiary_city}, // string, required
	"beneficiary_country": {beneficiary_country}, // string, required
	"beneficiary_email": {beneficiary_email}, // string, required
	"beneficiary_phone": {beneficiary_phone}, // string

	"customer_name": {customer_name}, // string, required
	"customer_street": {customer_street}, // string, required
	"customer_street_no": {customer_street_no}, // string, required
	"customer_zip": {customer_zip}, // string, required
	"customer_city": {customer_city}, // string, required
	"customer_country": {customer_country}, // string, required
	"customer_email": {customer_email}, // string, required
	"customer_phone": {customer_phone}, // string
}
```

### Response 201
```javascript
{
    "data": {
        "id": {id},
        "code": {code},
        "value": {value},
        "meta": {meta},
    
        "beneficiary_company": {beneficiary_company},
        "beneficiary_name": {beneficiary_name},
        "beneficiary_street": {beneficiary_street},
        "beneficiary_street_no": {beneficiary_street_no},
        "beneficiary_zip": {beneficiary_zip},
        "beneficiary_city": {beneficiary_city},
        "beneficiary_country": {beneficiary_country},
        "beneficiary_email": {beneficiary_email},
        "beneficiary_phone": {beneficiary_phone},
    
        "customer_name": {customer_name},
        "customer_street": {customer_street},
        "customer_street_no": {customer_street_no},
        "customer_zip": {customer_zip},
        "customer_city": {customer_city},
        "customer_country": {customer_country},
        "customer_email": {customer_email},
        "customer_phone": {customer_phone},
    }
}
```
