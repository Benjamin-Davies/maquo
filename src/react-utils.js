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

export function useFetchJson(url) {
  const [result, setResult] = useState({});

  useEffect(() => {
    fetch(url).then(res => {
      if (!res.ok)
        throw `Server responded with ${res.status} ${res.statusText}`;

      return res.json();
    }).then(setResult);
  }, [url]);

  return result;
}
