from dataclasses import dataclass, field


@dataclass
class Element:
    selector: str
    text: str


@dataclass
class IndexElements:
    login_link: Element = field(
        default_factory=lambda: Element(selector="a.nav-link", text="Login")
    )
    
INDEX = IndexElements()
