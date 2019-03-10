import {dom} from '../dom/dom';

/*
 * Mobile menu
 */
const mobileMenu = {
    menu: dom.find('#mobile-menu'),
    open: dom.find('#mobile-menu-open'),
    close: dom.find('#mobile-menu-close'),
};

if (mobileMenu.menu && mobileMenu.open && mobileMenu.close) {
    dom.on(mobileMenu.open, 'click', () => {
        mobileMenu.menu && mobileMenu.menu.classList.add('header__mobile-menu--open');
        mobileMenu.open && mobileMenu.open.setAttribute('style', 'display: none');
        mobileMenu.close && mobileMenu.close.setAttribute('style', 'display: inline');
    });

    dom.on(mobileMenu.close, 'click', () => {
        mobileMenu.menu && mobileMenu.menu.classList.remove('header__mobile-menu--open');
        mobileMenu.close && mobileMenu.close.setAttribute('style', 'display: none');
        mobileMenu.open && mobileMenu.open.setAttribute('style', 'display: inline');
    });
}
