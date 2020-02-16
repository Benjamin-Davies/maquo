const { useState, useEffect } = React;

export function useLocationHash() {
  const [hash, setHash] = useState(location.hash);
  useEvent(window, 'hashchange',
    () => setHash(location.hash));
  return hash;
}

export function useEvent(elem, event, listener, deps) {
  useEffect(() => {
    elem.addEventListener(event, listener);
    return () => elem.removeEventListener(event, listener);
  }, deps);
}
