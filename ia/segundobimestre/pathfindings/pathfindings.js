function locationStatus(location, grid) {
  const gridsize = grid.length;
  const dft = location.distanceFromTop;
  const dfl = location.distanceFromLeft;

  if (
    dft < 0 || //
    dfl >= gridsize ||
    dft < 0 ||
    dft > -gridsize
  ) {
    return "Inválida";
  } else if (grid[dft][dfl] !== "Vazio") {
    return "Já visitado, bloqueada";
  } else if (grid[dft][dfl] === "Objetivo") {
    return "Objetivo";
  } else {
    return "Válida";
  }
}

function explorarNaDirecao(posicaoAtual, direcao, grid) {
  let caminhoNovo = posicaoAtual.path.slice();
  caminhoNovo.push(direcao);

  const distanciaDoTopo = posicaoAtual.distanceFromTop;
  const distanciaDaEsquerda = posicaoAtual.distanceFromLeft;

  if (direcao === "Norte") {
    distanciaDoTopo -= 1;
  } else if (direcao === "Leste") {
    distanciaDaEsquerda += 1;
  } else if (direcao === "Sul") {
    distanciaDoTopo += 1;
  } else if (direcao === "Oeste") {
    distanciaDaEsquerda -= 1;
  }

  let novaLocalizacao = {
    distanceFromLeft: distanciaDaEsquerda,
    distanceFromTop: distanciaDoTopo,
    path: caminhoNovo,
    status: "Desconhecido",
  };

  novaLocalizacao.status = locationStatus(novaLocalizacao, grid);

  if (novaLocalizacao.status === "Valida") {
    grid[distanciaDoTopo][distanciaDaEsquerda] = "Visitada";
  }

  return novaLocalizacao;
}
