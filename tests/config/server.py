from dataclasses import dataclass

HOST = "localhost"
PORT = 8000
DOMAIN = "basics-auth"

SITE_URL = HOST + "/" + DOMAIN


@dataclass
class Pages:
    home: str = SITE_URL + "/"
    login: str = SITE_URL + "/login"
    dashboard: str = SITE_URL + "/dashboard"
    
PAGES = Pages()