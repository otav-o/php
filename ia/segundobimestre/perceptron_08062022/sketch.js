// Usar a biblioteca para desenahr o gráfico

let perceptron;
/**
 * Posições / pontos
 */
let points = Array(100);

function setup() {
  createCanvas(550, 550); // função do pj5 que usa o canvas do HTML

  /*
  perceptron = new Perceptron();

  const inputs = [-1, 0.5];
  const guess = perceptron.guess(inputs);

  console.log(`resultado ${guess}`);
  */


  perceptron = new Perceptron(2); // 2 pesos

  for (let i = 0; i < points.length; i++) {
    points[i] = new Point(random(-1, 1), random(-1, 1));
  }
}

// const draw = () => {
function draw() {
  background(255);

  for (let i = 0; i < points.length; i++) {
    points[i].show()
  }

  noStroke(); // não terá contorno

  // preencher somente o interior das circunferências

  for (let i = 0; i < points.length; i++) {
    const pt = points[i];
    const inputs = [pt.x, pt.y];
    const target = pt.label;

    const guess = perceptron.guess(inputs);

    if (guess == target) { // se acertou, preencher de verde
      fill(0, 255, 0)
    } else {
      fill(255, 0, 0);
    }

    ellipse(pt.getPixelX(), pt.getPixelY(), 15, 15)
  }
};

// dataset: massa de dados para teste
