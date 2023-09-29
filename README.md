# Conversor de R$ para $

Desktop app criado com php usando skoro/tkui.

### Requisitos

* PHP >= 8.2
* Extensão `ffi` precisa estar habilitada
* Tcl/Tk >= 8.6

<p align="center"><img src="/img/interface.png"></p>

### Getting started

Precisa ter instalado no seu sistema operacional Tcl/Tk. Para distribuição Debian/Ubuntu poderá instalar com `apt`:
```sh
sudo apt install tcl tk
```
Para verificar se a extensão `FFI` esta habilitada:
```sh
php --ri ffi
```

Clone o repositório e execute o arquivo index.php:
```sh
git clone https://github.com/doniztjnr/conversor-real-dolar.git
cd conversor-real-dolar
composer install
php ./src/index.php
```

### Configuração

Crie um arquivo `.env` e copie nele as variáveis de ambiente do arquivo `.env.example`.

Habilite o modo debug caso de algum erro de execução:
```env
DEBUG=true
DEBUG_LOG=php://stdout
```

Deixe a `THEME` como auto para ser usada o thema do seu sistema operacional:
```env
THEME=auto
```

### Windows

Você pode instalar [Tcl/Tk binary distributions](https://wiki.tcl-lang.org/page/Binary+Distributions) e configurar os caminhos das dlls
no arquivo `.env`:

```
WINDOWS_LIB_TCL=C:\\tcltk\\bin\\tcl86t.dll
WINDOWS_LIB_TK=C:\\tcltk\\bin\\tk86t.dll
```

### macOS

Instalara instalar Tcl/Tk binary distributions usando brew:

```sh
brew install tcl-tk
```

E configurar os caminhos das dylibs no arquivo no arquivo `.env`:

```
DARWIN_LIB_TCL=/usr/local/Cellar/tcl-tk/[installed_version]/lib/libtcl8.6.dylib
DARWIN_LIB_TK=/usr/local/Cellar/tcl-tk/[installed_version]/lib/libtk8.6.dylib
```