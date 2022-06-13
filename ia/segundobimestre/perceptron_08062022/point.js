class Point {
  x = 0;
  y = 0;
  label = 0;

  constructor(x, y) {
    this.x = x;
    this.y = y;

    this.label = this.getLabel();
  }

  /**
   * Função de classificação, divide em grupos. É o que a nossa rede perceptron vai ter que adivinhar, uma linha que passa no gráfico
   * @returns
   */
  getLabel() {
    if (this.x > this.y) {
      return 1;
    } else {
      return -1;
    }
  }

  // map é do p5, faz uma normalização para desenahr
  getPixelX() {
    const px = map(this.x, -1, 1, 0, width);
    return px;
  }

  getPixelY() {
    const py = map(this.y, -1, 1, height, 0);
    return py;
  }

  show() {
    stroke(0); // cria uma linha no ponto 0

    if (this.label === 1) {
      fill(0); // preeencher com cor preta
    } else {
      fill(255); // branco
    }

    const px = this.getPixelX();
    const py = this.getPixelY();

    ellipse(px, py, 22, 22);
  }

  debug() {
    console.log(`label: ${this.label}, x: ${this.x}, y: ${this.y}}`);
  }
}
