import requestsfrom google.auth.transport.requests import Requestfrom google.oauth2 import service_accountimport timeimport certifidef get_access_token():    credentials = service_account.Credentials.from_service_account_file(        "service-account.json",        scopes=["https://www.googleapis.com/auth/firebase.messaging"]    )    credentials.refresh(Request())    return credentials.token    print("Getting access token...")while True:    print("Access token:")    accessToken = get_access_token()    print(accessToken)    requests.post("https://bettercode.my.id/trading_notification/set_server_key.php", data={        "access_token": accessToken    }, verify=certifi.where())    time.sleep(30*60)