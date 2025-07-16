from dataclasses import dataclass
from playwright.sync_api import Page, expect

from tests.config.server import PAGES
from tests.config.ui import TITLE

from tests.elements.index import INDEX

def test_has_title(page: Page):
    """is title correct?"""
    page.goto(PAGES.home)
    expect(page).to_have_title(TITLE)


def test_login_link(page: Page):
    """is login link correct?"""
    page.goto(PAGES.home)
    page.locator(INDEX.login_link.selector, has_text=INDEX.login_link.text).is_visible()
