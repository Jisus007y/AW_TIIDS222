matriz = [ 
    [73, 12, 89, 34] ,
    [5, 61, 27, 94] ,
    [46, 18, 80, 3]
]

matriz.append([39, 22, 69, 17])
print(matriz)
print(matriz[1])

for i in matriz:
    if 27 in i:
        print(f"27 encontrado en la fila {i}")
        break

    for pilas in matriz:
        for numeros in filas:
            if numeros == 3:
                print(f"3 encontrado en la fila {filas}")
                break


numeros = [10, 20, 30, 40]
numeros.insert( numeros, [50, 60] )
print(numeros)