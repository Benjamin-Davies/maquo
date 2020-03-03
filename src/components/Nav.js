const { createElement: c } = React;

function Nav() {
  return c('nav', { className: 'Nav Nav--smaller' },
    c('ul', { className: 'Nav__inner' },
      c('li', null,
        c('a', {
          className: 'Nav__logo',
          href: '#'
        }, 'Maquo'),
      ),
    ),
  );
}

export default Nav;
