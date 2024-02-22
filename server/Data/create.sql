-- Tabela TipoConta
DROP TABLE Filme;

CREATE TABLE Filme (
    id serial PRIMARY KEY,
    Titulo VARCHAR(150),
    Imdb VARCHAR(10),
    Genero VARCHAR(50),
    Elenco VARCHAR(50),
    Idioma VARCHAR(50),
    Qualidade VARCHAR(10),
    Duracao VARCHAR(10),
    AnoLancamento VARCHAR(50),
    Video VARCHAR(50),
    Audio VARCHAR(50),
    Sinopse VARCHAR(50),
    Trailler VARCHAR(50),
    ImagemCapa VARCHAR(50),
    Categoria VARCHAR(50),
    DataPublicacao DateTime
);