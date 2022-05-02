/**
 * Representa um estado do tabuleiro por meio de uma matriz
 */
class No {
  constructor(matriz, filhos) {
    this.matriz = matriz;
    this.filhos = filhos;
  }

  matriz = [
    ["", "", ""],
    ["", "", ""],
    ["", "", ""],
  ];

  /*
    0,0  0,1  0,2
    1,0  1,1  1,2
    2,0  2,1  2,2
  */

  /**
   * H1: calcular o número de linhas, colunas e diagonais possíveis de vitória
   *
   * @param {string} jogador
   * @return {int} heurística de vitórias possíveis
   */
  getHeuristicaH1(jogador) {
    oponente = jogador === "X" ? "O" : "X";
    let linhasPossiveis = 0;
    let colunasPossiveis = 0;
    let diagonaisPossiveis = 0;

    this.matriz.forEach((linha) => {
      let naoTemOponenteNaLinha = true;

      linha.forEach((casa) => {
        // se nenhuma casa da linha estiver preenchida com o oponente, adicionar 1, pois é uma linha possível de vitória
        if (casa === oponente) {
          naoTemOponenteNaLinha = false;
        }
      });

      if (naoTemOponenteNaLinha) {
        linhasPossiveis++;
      }
    });

    const coluna0 = this.matriz.map((linha) => linha[0]);
    const coluna1 = this.matriz.map((linha) => linha[1]);
    const coluna2 = this.matriz.map((linha) => linha[2]);

    const diagonal1 = [
      this.matriz.linha[0],
      this.matriz.linha[1],
      this.matriz.linha[2],
    ];
    const diagonal2 = [
      this.matriz.linha[2],
      this.matriz.linha[1],
      this.matriz.linha[0],
    ];

    const colunas = [coluna0, coluna1, coluna2];
    const diagonais = [diagonal1, diagonal2];

    colunas.forEach((coluna) => {
      // se nenhuma casa da coluna estiver preenchida com o oponente, adicionar 1
      let naoTemOponenteNaColuna = true;

      coluna.forEach((casa) => {
        if (casa === oponente) {
          naoTemOponenteNaColuna = false;
        }
      });

      if (naoTemOponenteNaColuna) {
        colunasPossiveis++;
      }
    });

    diagonais.forEach((diagonal) => {
      // se nenhuma casa da diagonal estiver preenchida com o oponente, adicionar 1
      let naoTemOponenteNaDiagonal = true;

      diagonal.forEach((casa) => {
        if (casa === oponente) {
          naoTemOponenteNaDiagonal = false;
        }
      });

      if (naoTemOponenteNaDiagonal) {
        diagonaisPossiveis++;
      }
    });

    let heuristica = -(linhasPossiveis + colunasPossiveis + diagonaisPossiveis); // transformar o número em negativo, pois quanto menor a heurística, mais perto do objetivo (de vitória) ela está
    return heuristica;

    // Explicação desta heurística: calcular, para um determinado tabuleiro (matriz do nó), as linhas, colunas e diagonais disponíveis para a vitória. Não considera se o adversário está quase ganhando (isso deve estar em outra heurística).
  }

  /**
   * H4: número de linhas para vitória desconsiderando o estado atual do tabuleiro (valores fixos)
   * @param {int} posicao
   * @return heuristica
   */
  getHeuristicaH4(posicao) {
    // Primeiro, definir as posições

    const extremidadesMeio = [1, 3, 5, 7];
    const extremidadesDiagonais = [0, 2, 6, 8];
    const centro = [4];

    let heuristica;

    // atribuir os valores de heurística

    if (extremidadesMeio.includes(posicao)) {
      // possui a maior heurística, pois tem as menores chances de vitória
      heuristica = 3;
    } else if (extremidadesDiagonais.includes(posicao)) {
      heuristica = 2;
    } else if (centro.includes(posicao)) {
      heuristica = 1;
    }

    // Explicação desta heurística: jogar na posição que possui o maior número de linhas vencedoras para a IA (laterais que não são esquinas têm 2 linhas possíveis [uma linha e uma coluna], as extremidades da diagonal têm 3 [uma linha, uma coluna e uma diagonal - devendo possuir heurística menor que as laterais, pois são melhores] e o centro tem 4 linhas vitoriosas, possuindo a menor heurística de todas).
  }
}
