const { useState, useEffect, useRef } = React;

export function useFocusRef(deps = []) {
  const ref = useRef();
  useEffect(() => {
    ref.current.focus();
  }, [...deps, ref.current]);
  return ref;
}

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

export function useAsync(fn, deps) {
  const [result, setResult] = useState(null);

  useEffect(() => {
    let canceled = false;

    fn().then(res => {
      if (!canceled) setResult(res);
    });

    return () => canceled = true;
  }, deps);

  return result;
}

export function useFetchJson(url) {
  return useAsync(async () => {
    const res = await fetch(url);

    if (!res.ok)
      throw `Server responded with ${res.status} ${res.statusText}`;

    return await res.json();
  }, [url]);
}
