import LoadingCounter from '../../domain/loading/LoadingCounter.js'

class LoadingOverlayService {
  constructor() {
    this.counter = new LoadingCounter()
    this.listeners = new Set()
    this.visible = false
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
    this.emitIfChanged()

    try {
      return await request()
    } finally {
      this.counter.end()
      this.emitIfChanged()
    }
  }

  emitIfChanged() {
    const isLoading = this.counter.isLoading()

    if (this.visible === isLoading) {
      return
    }

    this.visible = isLoading

    this.listeners.forEach((listener) => listener(isLoading))
  }
}

export default new LoadingOverlayService()
