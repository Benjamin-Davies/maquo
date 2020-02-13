const { useState, useEffect } = React;

export function useLocationHash() {
    const [hash, setHash] = useState(() => location.hash);

    useEffect(() => {
        const listener = () => setHash(location.hash);
        window.addEventListener('hashchange', listener);
        return () => window.requestAnimationFrame('hashchange', listener);
    });

    return hash;
}