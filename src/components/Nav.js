const { createElement: c } = React;

function Nav() {
  return c('nav', { className: 'Nav' },
    c('ul', { className: 'Nav__inner' },
      c('li', null,
        c('a', {
          className: 'Nav__logo',
          href: '#'
        }, 'Maquo'),
      ),
      c('li', { className: 'Nav__spacer' }),
      c('li', null,
        c('a', {
          className: 'Nav__link',
          href: 'create/'
        }, 'Create Quizz'),
      ),
    ),
  );
}

export default Nav;
