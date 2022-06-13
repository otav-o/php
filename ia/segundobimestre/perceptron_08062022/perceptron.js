/**
 * Função de ativação
 */
function sign(num) {
  return num >= 0 ? 1 : -1;
}

class Perceptron {
  weights = [0, 0];
  learningRate;

  constructor() {
    // inicializa os pesos com valores aleatórios
    for (let i = 0; i < this.weights.length; i++) {
      this.weights[i] = random(-1, 1);
    }
  }

  constructor(numberOfWeights) {
    // inicializa os pesos com valores aleatórios
    for (let i = 0; i < this.weights.length; i++) {
      this.weights[i] = random(-1, 1);
    }
  }

  // Função que tenta adivinahr a saída.

  guess(inputs) {
    let sum = 0;

    for (let i = 0; i < this.weights.length; i++) {
      sum += inputs[i] * this.weights[i];
    }

    const output = sign(sum); // função sinal da soma

    return output;
  }

  /**
   * Método de treinamento
   */
  train(inputs, target) {
    const guess = this.guess(inputs);  // tenta adivinhar
    const error = target - guess; // erro = objetivo (-) o que tentou adivinhar 

    for (let i = 0; i < this.weights.length; i++) {
      this.weights[i] += error * inputs[i] * this.learningRate // adiciona, mas pode diminuir (o valor do erro pode ser negativo)
      // learn rate resolve o problema de overshoot (ajustar demais)
    }
  }
}
