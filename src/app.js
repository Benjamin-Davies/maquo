import App from './components/App.js';

const { createElement: c } = React;

ReactDOM.render(
  c(App),
  document.querySelector('#root'),
);
