function semClicar(numeroEstrelasBancoDeDados){
	var img1 = document.querySelector("#img1")
	var img2 = document.querySelector("#img2")
	var img3 = document.querySelector("#img3")
	var img4 = document.querySelector("#img4")
	var img5 = document.querySelector("#img5")

	if(numeroEstrelasBancoDeDados == 1){
		img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
		img2.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
		img3.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
		img4.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
		img5.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
	}
	else{
		if(numeroEstrelasBancoDeDados == 2){
			img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
			img2.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
			img3.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
			img4.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
			img5.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
		}
		else{
			if(numeroEstrelasBancoDeDados == 3){
				img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
				img2.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
				img3.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
				img4.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
				img5.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
			}
			else{
				if(numeroEstrelasBancoDeDados == 4){
					img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					img2.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					img3.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					img4.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					img5.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
				}
				else{
					if(numeroEstrelasBancoDeDados == 5){
						img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
						img2.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
						img3.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
						img4.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
						img5.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					}
					else{
						console.log("Alguma coisa muito grave ocorreu com esse código")
					}
				}
			}
		}
	}
}

function contarEstrelas(numeroEstrelas){
	document.querySelector("#avaliacao").value = numeroEstrelas

	var img1 = document.querySelector("#img1")
	var img2 = document.querySelector("#img2")
	var img3 = document.querySelector("#img3")
	var img4 = document.querySelector("#img4")
	var img5 = document.querySelector("#img5")

	if(numeroEstrelas == 1){
		img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
		img2.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
		img3.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
		img4.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
		img5.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
	}
	else{
		if(numeroEstrelas == 2){
			img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
			img2.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
			img3.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
			img4.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
			img5.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
		}
		else{
			if(numeroEstrelas == 3){
				img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
				img2.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
				img3.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
				img4.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
				img5.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
			}
			else{
				if(numeroEstrelas == 4){
					img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					img2.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					img3.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					img4.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					img5.setAttribute("src", "../z-anexos/psd-img/estrelaNaoPintada.svg")
				}
				else{
					if(numeroEstrelas == 5){
						img1.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
						img2.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
						img3.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
						img4.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
						img5.setAttribute("src", "../z-anexos/psd-img/estrelaPintada.svg")
					}
					else{
						console.log("Alguma coisa muito grave ocorreu com esse código")
					}
				}
			}
		}
	}
}