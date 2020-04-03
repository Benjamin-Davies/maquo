// Ensures that an async action is never run while
// another instance of it is running.
// Will only return when the action finishes and
// there are no further updates to run.
export function throttleUpdates(action) {
  const throttler = new UpdateThrottler(action);
  return throttler.call;
}

// Inner workings and state for `throttleUpdates`
class UpdateThrottler {
  constructor(action) {
    this.action = action;
    this.currentPromise = null;
    this.nextArgs = null;

    // So that the function can be passed around
    // and will remember which object it belongs to
    this.call = this.call.bind(this);
  }

  call(...args) {
    this.nextArgs = args;

    if (!this.currentPromise) {
      this.currentPromise = this.runAction();
    }

    return this.currentPromise;
  }

  async runAction() {
    let res = null;

    try {
      while (this.nextArgs) {
        const args = this.nextArgs;
        this.nextArgs = null;

        res = await this.action(...args);
      }
    } finally {
      this.currentPromise = null;
    }

    return res;
  }
}
