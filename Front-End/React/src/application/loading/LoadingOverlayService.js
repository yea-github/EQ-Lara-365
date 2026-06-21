import LoadingCounter from '../../domain/loading/LoadingCounter.js'

class LoadingOverlayService {
  constructor() {
    this.counter = new LoadingCounter()
    this.listeners = new Set()
  }

  subscribe(listener) {
    this.listeners.add(listener)
    listener(this.counter.isLoading())

    return () => {
      this.listeners.delete(listener)
    }
  }

  async track(request) {
    this.counter.begin()
    this.emit()

    try {
      return await request()
    } finally {
      this.counter.end()
      this.emit()
    }
  }

  emit() {
    const isLoading = this.counter.isLoading()

    this.listeners.forEach((listener) => listener(isLoading))
  }
}

export default new LoadingOverlayService()
