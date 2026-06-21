class LoadingCounter {
  constructor() {
    this.activeRequests = 0
  }

  begin() {
    this.activeRequests += 1
  }

  end() {
    this.activeRequests = Math.max(0, this.activeRequests - 1)
  }

  isLoading() {
    return this.activeRequests > 0
  }
}

export default LoadingCounter
