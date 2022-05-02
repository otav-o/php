var tabuleiroOriginal;
const jogador = "O";
const ia = "X";
const vitorias = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],
  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],
  [0, 4, 8],
  [6, 4, 2],
];

const celulas = document.querySelectorAll(".cell"); // todas as casas
startGame();

function startGame() {
  document.querySelector(".mensagem").style.display = "none";
  tabuleiroOriginal = Array.from(Array(9).keys());
  for (var i = 0; i < celulas.length; i++) {
    celulas[i].innerText = "";
    celulas[i].style.removeProperty("color");
    celulas[i].addEventListener("click", marcarCasa, false); // executa marcarCasa ao clicar em uma célula
  }
}

function marcarCasa(casa) {
  if (typeof tabuleiroOriginal[casa.target.id] == "number") {
    turno(casa.target.id, jogador);
    if (!verificarVitoria(tabuleiroOriginal, jogador) && !verificarEmpate())
      turno(minimax(tabuleiroOriginal, ia).index, ia);
  }
}

/**
 * Calcula o valor da heurística para um determinado estado do tabuleiro
 * @param {No} no estado do tabuleiro
 * @param {string} player jogador ou ia
 * @returns {number} valor da heurística para o nó
 */
const heuristicaJogodaVelha = (no, player = ia) => {
  // seguimos a árvore de busca com menor heurística, não abre todos os nós
  // tem que comparar com os estados anteriores abertos, é sempre a menor heurística

  // Heurísticas que pensei (só fiz a h1 e h4):

  // heurística h1: jogar na posição em que o jogador possui mais linhas vitoriosas
  // h2: número de casas restantes para ganhar naquela linha ou diagonal
  // h3: número de casas restantes para o adversário ganhar
  // h4: número de linhas para vitória desconsiderando o estado atual do tabuleiro (valores fixos)

  no.getHeuristicaNumeroLinhasPossiveisVitoria(player);

  let atual;
  let abertos = []; // fila de nós abertos
  let fechados = []; // fila de nós fechados

  // Importante: a heurística mesmo está na classe Nó. Aqui, tento fazer a implementação no jogo.

  abertos = no.filhos.sort(getHeuristicaH1(player)); // ordenar da menor heurística (maior número de linhas = mais fácil de ganhar) à maior (mais difícil)

  for (atual = abertos[0]; atual !== null; atual = abertos[0]) {
    // pega sempre o primeiro nó da fila
    if (verificarVitoria(atual.matriz, player)) {
    }
  }

  // Não consegui terminar a implementação para ganhar os pontos extras, mas as heurísticas estão na classe No.
  // Gildo, gostaria de saber se você poderia avaliar o máximo possível, pois preciso de 3.2 pontos para não reprovar de cara no primeiro bimestre, garanto que vou melhor no próximo (até mesmo para conseguir ir para a prova final). Tentei implementar duas heurísticas, a teoria não é difícil, mas a codificação, sim. Espero que tenha ficado próximo do correto.
};

function turno(casaId, jogador) {
  tabuleiroOriginal[casaId] = jogador;
  document.getElementById(casaId).innerText = jogador;
  let ganhou = verificarVitoria(tabuleiroOriginal, jogador);
  if (ganhou) gameOver(ganhou);
}

function verificarVitoria(tabuleiro, jogador) {
  let ganhou = null;
  for (let i = 0; i <= 7; i++) {
    const vitoria = vitorias[i];
    let a = tabuleiro[vitoria[0]];
    let b = tabuleiro[vitoria[1]];
    let c = tabuleiro[vitoria[2]];
    if (a === "" || b === "" || c === "") {
      continue;
    }
    if (a === b && b === c && c === jogador) {
      ganhou = { index: i, player: jogador };
      break;
    }
  }
  return ganhou;
}

function gameOver(ganhou) {
  for (let index of vitorias[ganhou.index]) {
    document.getElementById(index).style.color =
      ganhou.player == jogador ? "blue" : "red";
  }
  for (var i = 0; i < celulas.length; i++) {
    celulas[i].removeEventListener("click", marcarCasa, false);
  }
  const msg = ganhou.player == jogador ? "Jocê Ganhou!" : "Você perdeu.";
  document.querySelector(".mensagem").style.display = "block";
  document.querySelector(".mensagem .text").innerText = msg;
}

function casasVazias() {
  return tabuleiroOriginal.filter((s) => typeof s == "number");
}

function verificarEmpate() {
  if (casasVazias().length == 0) {
    for (var i = 0; i < celulas.length; i++) {
      celulas[i].style.color = "green";
      celulas[i].removeEventListener("click", marcarCasa, false);
    }
    document.querySelector(".mensagem").style.display = "block";
    document.querySelector(".mensagem .text").innerText = "Empate!";
    return true;
  }
  return false;
}
