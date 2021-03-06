<?php
/*
* @Title: Nota Fiscal de Servi�o de Comunica��o, modelo 21
* @Description:
* @Ref.:
*   - Especifica��o/refer�ncia: https://www.confaz.fazenda.gov.br/legislacao/convenios/2003/cv115_03an0-1.pdf
*   - Downloads: https://portal.fazenda.sp.gov.br/servicos/nf-comunicacao-energia/Paginas/Sobre.aspx
* @File Encode: ISO 8859 - 1 (Latin - 1)
* @Coder: <deepcell@gmail.com>
* @Notes: Ver Tabelas e Items abaixo.
*
*	+------------------------------------------+
*   | Tabela 1 (ref. 11.2.2)                   |
*	+---------------------------------+--------+
*	| Tipo de Utiliza��o              | Codigo |
*	+---------------------------------+--------+
*	| Telefonia                       | 1      |
*	| Comunica��o de dados            | 2      |
*	| TV por Assinatura               | 3      |
*	| Provimento de acesso � Internet | 4      |
*	| Multim�dia                      | 5      |
*	| Outros                          | 6      |
*	+---------------------------------+--------+
*
*	+------------------------------------------------------------------------------------------------------------------+
*   | Tabela 2 - Tipo de Cliente de Servi�os de Comunica��o                                                            |
*	+---------------------------------------------------------------------------------------------------------+--------+
*   | Tipo de Cliente                                                                                         | Codigo |
*	+---------------------------------------------------------------------------------------------------------+--------+
*   | Comercial                                                                                               | 01     |
*   | Industrial                                                                                              | 02     |
*   | Residencial/Pessoa F�sica                                                                               | 03     |
*   | Produtor Rural                                                                                          | 04     |
*   | �rg�o da administra��o p�blica estadual direta e suas funda��es e autarquias, quando mantidas pelo      | 05     |
*   |  poder p�blico estadual e regidas por normas de direito p�blico, termos Conv�nio ICMS 107/95.           |        |
*   | Prestador de servi�o de telecomunica��o respons�vel pelo recolhimento do imposto incidente sobre a      | 06     |
*   |  cess�o dos meios de rede do prestador do servi�o ao usu�rio final, termos Conv�nio ICMS 17/13.         |        |
*   | Miss�es Diplom�ticas, Reparti��es Consulares e Organismos Internacionais, termos Conv�nio ICMS 158/94.  | 07     |
*   | Igrejas e Templos de qualquer natureza                                                                  | 08     |
*   | Outros n�o especificados anteriormente                                                                  | 99     |
*	+---------------------------------------------------------------------------------------------------------+--------+
*
*
*	+------------------------------------------------------------------------------------------------------------------+
*	| Item 1                                                                                                           |
*	+------------------------------------------------------------------------------------------------------------------+
*	| Numerar os documentos fiscais em ordem crescente, consecutiva de 000.000.001 a 999.999.999, devendo ser cont�nua,|
*	| sem intervalo ou quebra de seq��ncia de numera��o, devendo ser reiniciada a numera��o a cada per�odo de apura��o.|
*	+------------------------------------------------------------------------------------------------------------------+
*
*	+------------------------------------------------------------------------------------------------------------------+
*   | Item 2
*	+------------------------------------------------------------------------------------------------------------------+
*   | Informar os outros valores constantes do documento fiscal, com 2 decimais. Neste campo devem ser informados      |
*   | multa e juros, tributos que n�o comp�em a BC do ICMS, cobran�a de terceiros, mercadorias ou servi�os com ICMS    |
*   | diferido e quaisquer outros valores, ainda que estranhos � tributa��o do ICMS.                                   |
*	+------------------------------------------------------------------------------------------------------------------+
*
*	+------------------------------------------------------------------------------------------------------------------+
*   | Item 3
*	+------------------------------------------------------------------------------------------------------------------+
*   | "S", documento fiscal cancelado dentro do mesmo per�odo de apura��o;                                             |
*   | "R", documento fiscal emitido em substitui��o a um documento fiscal cancelado dentro do mesmo per�odo de apura��o|
*   | "C", documento fiscal complementar;                                                                              |
*   | "N", demais casos.                                                                                               |
*   | SE situa��o "R" ou "C", deve ser preenchido o campo 34 - "Informa��es Adicionais".                               |
*	+------------------------------------------------------------------------------------------------------------------+
*
*	+------------------------------------------------------------------------------------------------------------------+
*   | Item 4
*	+------------------------------------------------------------------------------------------------------------------+
*   | Em se tratando de Nota Fiscal de Servi�o de Comunica��o, modelo 21, ou Nota Fiscal de Servi�o de Telecomunica��o,|
*   | modelo  22, informar a localidade de registro e o n�mero do terminal no formato "LLNNNNNNNN", onde "LL" � o      |
*   | c�digo da localidade e "NNNNNNNN", o n�mero de identifica��o do terminal. No caso de n�mero de identifica��o do  |
*   | terminal com 9 (nove) d�gitos, utilizar o formato "LLNNNNNNNNN". Quando se tratar de Nota Fiscal/Conta de Energia|
*   | El�trica, modelo 6, informar o n�mero da unidade consumidora. Nos demais casos, deixar em branco;                |
*	+------------------------------------------------------------------------------------------------------------------+
*
*	+------------------------------------------------------------------------------------------------------------------+
*   | Item 5                                                                                                           |
*	+------------------------------------------------------------------------------------------------------------------+
*   | d�gito "1" se o conte�do for um CNPJ ou com o d�gito                                                             |
*   | d�gito "2" se o conte�do for um CPF.                                                                             |
*   | d�gito "3" se pessoa jur�dica n�o obrigada � inscri��o no CNPJ.                                                  |
*   | d�gito "4" se pessoa f�sica n�o obrigada ao CPF.                                                                 |
*	+------------------------------------------------------------------------------------------------------------------+
*
*	+------------------------------------------------------------------------------------------------------------------+
*   | Item 6                                                                                                           |
*	+------------------------------------------------------------------------------------------------------------------+
*   | Devem ser informados: refer�ncia de apura��o(4 algarismos), modelo(2 caracteres), s�rie(3 caracteres),           |
*   | n�mero(9 algarismos) e data de emiss�o(8 algarismos), totalizando 30 caracteres, no seguinte formato:            |
*   | "AAMM_MO_SSS_NNNNNNNNN_AAAAMMDD". Exemplo: "0901_22_A  _000001234_20090131", para o documento fiscal da          |
*   | refer�ncia "0901", modelo "22", s�rie "A", n�mero "000001234", emitido em 31/01/2009. Nos demais casos,          |
*   | preencher com brancos;                                                                                           |
*	+------------------------------------------------------------------------------------------------------------------+
*
*
*	+------------------------------------------------------------------------------------------------------------------+
*   | Observacoes
*	+------------------------------------------------------------------------------------------------------------------+
*   | * Os campos 22 e 26 serao preenchidos com BRANCOS.                                                               |
*   | A identifica��o dos arquivos devem seguir o seguinte formato:
*   |
*   | +------------------------------------------------------------+-----+-------------------------+
*   | | NOME DO ARQUIVO                                            |     | EXTENSAO                |
*   | +------------------------------------------------------------+-----+-------------------------+
*   | | UU  CCCCCCCCCCCCCC  MM      SSS    AA   MM   Snn     T     |  .  | VVV                     |
*   | | UF  CNPJ            Modelo  Serie  Ano  Mes  Status  Tipo  |     | Volume (inicia em 001)  |
*   | +------------------------------------------------------------+-----+-------------------------+
*   |
*	+------------------------------------------------------------------------------------------------------------------+
*
*
* @Obs.:
*	=> Arquivos da refer�ncia "1701":
*	1) Validar os arquivos com o Programa Validador - Vers�o 3.00a - Publicado em 14/02/2017;
*	2) Conclu�da com sucesso a valida��o, gerar o arquivo de controle;
*	3) Clicando no  bot�o "Gerar Recibo de Entrega", gerar o recibo selecionando o arquivo de controle do passo anterior;
*	4) No recibo gerado, obter a "Chave de Codifica��o Digital do Arquivo Mestre", para escritura��o na EFD ( Escritura��o Fiscal Digital), antes do dia 20 de cada m�s;
*	5) Aguardar a publica��o da vers�o do "GeraMidiaTED" que possibilitar� a transmiss�o dos arquivos para a SEFAZ/SP.
*
*	=> Arquivos da refer�ncia "1702" (e posteriores):
*	Aguardar a publica��o de vers�o posterior do Validador, prevista para 10/mar/2017.
*
* @Date: 2017-02-10
* @Last Update: 2017-02-20, 2017-02-21, 2017-02-22, 2017-02-23, 2017-02-24, 2017-02-25
*
* @License:
* GNU General Public License v3.0
* Permissions of this strong copyleft license are conditioned on making available complete source
* code of licensed works and modifications, which include larger works using a licensed work, under
* the same license. Copyright and license notices must be preserved. Contributors provide an express
* grant of patent rights.
*
*/

class Nfsc_21
{
    /*
	MESTRE - Arquivo tipo MESTRE DE DOCUMENTO FISCAL
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    | N� | CONTEUDO                                                | TAM. | INICIO | FIM | FORMATO | OBS
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    | 01 | CNPJ ou CPF                                             | 14   | 1      | 14  | N       | pessoa n�o obrigada � inscri��o no CNPJ ou CPF, preencher o campo com zeros;
    | 02 | IE                                                      | 14   | 15     | 28  | X       | pessoa n�o obrigada � inscri��o estadual, preencher o campo com a express�o "ISENTO";
    | 03 | Raz�o Social ou nome do cliente                         | 35   | 29     | 63  | X       |
    | 04 | UF                                                      | 2    | 64     | 65  | X       | UF da localiza��o do consumidor - Para o exterior preencher o campo com EX
    | 05 | Classe de Consumo                                       | 1    | 66     | 66  | N       | IMPORTANTE: preencher com zeros para NF de comunicacao;
    | 06 | Fase ou Tipo de Utiliza��o                              | 1    | 67     | 67  | N       | tipo de utiliza��o, conforme tabela 1;
    | 07 | Grupo de Tens�o                                         | 2    | 68     | 69  | N       | informar apenas para conta de energia eletrica, Nos demais caso dever� ser preenchido com 00;
    | 08 | C�digo de Identifica��o do consumidor ou assinante      | 12   | 70     | 81  | X       | ID do cliente no sistema de processamento de dados da empresa.
    | 09 | Data de emiss�o                                         | 8    | 82     | 89  | N       | data de emiss�o do documento fiscal no formato AAAAMMDD;
    | 10 | Modelo                                                  | 2    | 90     | 91  | N       | Conta de Energia El�trica, modelo 6, Servi�o de Telecomunica��es, modelo 22  ou  Servi�o de Comunica��o, modelo 21
    | 11 | S�rie                                                   | 3    | 92     | 94  | X       | no m�nimo, uma letra n�o acentuada, ou um algarismo de 1 a 9 e ter seu preenchimento iniciado a partir da esquerda (exemplo: "A ", e n�o " A") Hifen e espacos em branco sao aceitos. utilizar a letra "U" para indicar a s�rie �nica.
    | 12 | N�mero                                                  | 9    | 95     | 103 | N       | n�mero seq�encial atribu�do pelo sistema eletr�nico de processamento de dados ao documento fiscal (ver item 1). O campo dever� ser alinhado � direita com as posi��es n�o significativas preenchidas com zeros;
    | 13 | C�digo de Autentica��o Digital do documento fiscal      | 32   | 104    | 135 | X       | Criar um hash MD5() na cadeia de caracteres formada pelos campos 01, 12, 14, 15, 16, 09 e 27, nessa ordem, respeitando o tamanho previsto do campo, assim como os brancos e zeros de preenchimento.
    | 14 | Valor Total (com 2 decimais)                            | 12   | 136    | 147 | N       | Informar o Valor Total do documento fiscal, com 2 decimais;
    | 15 | BC ICMS (com 2 decimais)                                | 12   | 148    | 159 | N       | Informar a Base de C�lculo do ICMS destacado no documento fiscal, com 2 decimais;
    | 16 | ICMS destacado (com 2 decimais)                         | 12   | 160    | 171 | N       | Informar o valor do ICMS destacado no documento fiscal, com 2 decimais;
    | 17 | Opera��es isentas ou n�o tributadas (com 2 decimais)    | 12   | 172    | 183 | N       | Informar o valor das opera��es ou servi�os isentos ou n�o tributados pelo ICMS, com 2 decimais;
    | 18 | Outros valores (com 2 decimais)                         | 12   | 184    | 195 | N       | ver item 2.
    | 19 | Situa��o do documento                                   | 1    | 196    | 196 | X       | ver item 3.
    | 20 | Ano e M�s de refer�ncia de apura��o                     | 4    | 197    | 200 | N       | Informar o ano e m�s de refer�ncia de apura��o do ICMS do documento fiscal, utilizando o formato "AAMM";
    | 21 | Refer�ncia ao item da NF                                | 9    | 201    | 209 | N       | Informar o n�mero do registro do arquivo ITEM DO DOCUMENTO FISCAL, onde se encontra o primeiro item do documento fiscal;
    | 22 | N�mero do terminal telef�nico ou da unidade consumidora | 12   | 210    | 221 | X       | ver item 4 (Nao esta claro qual numero telefonico precisa ser)
    | 23 | Indica��o do tipo de informa��o contida no campo 1      | 1    | 222    | 222 | N       | ver item 5.
    | 24 | Tipo de cliente                                         | 2    | 223    | 224 | N       | ver tabela 2.
    | 25 | Subclasse de consumo                                    | 2    | 225    | 226 | N       | Em se tratando de Nota Fiscal de Servi�o de Comunica��o, modelo 21, ou Nota Fiscal de Servi�o de Telecomunica��o, modelo 22, preencher com zeros.
    | 26 | N�mero do terminal telef�nico principal                 | 12   | 227    | 238 | X       | Para planos individuais e nota fiscal modelo 6, o campo deve ser preenchido com brancos. (Nao esta claro qual numero telefonico precisa ser)
    | 27 | CNPJ do emitente                                        | 14   | 239    | 252 | N       | CNPJ da empresa que emite o documento fiscal.
    | 28 | N�mero ou c�digo da fatura comercial                    | 20   | 253    | 272 | X       | atribu�do pelo sistema de faturamento do emitente.
    | 29 | Valor total da fatura comercial                         | 12   | 273    | 284 | N       | 2 decimais.
    | 30 | Data de leitura anterior                                | 8    | 285    | 292 | N       | Em se tratando de nota fiscal modelo 6, informar a data da leitura anterior, no formato AAAAMMDD. Nos demais casos, preencher com zeros;
    | 31 | Data de leitura atual                                   | 8    | 293    | 300 | N       | Em se tratando de nota fiscal modelo 6, informar a data de leitura atual, no formato AAAAMMDD. Nos demais casos, preencher com zeros;
    | 32 | Brancos - reservado para uso futuro                     | 50   | 301    | 350 | X       | Informar a chave de acesso do documento fiscal eletr�nico (CV115-e). Nas unidades federadas em que tal documento n�o tiver sido implementado, preencher com brancos;
    | 33 | Brancos - reservado para uso futuro                     | 8    | 351    | 358 | N       | Informar a data da autoriza��o de emiss�o do documento fiscal eletr�nico (CV115-e),  no  formato  AAAAMMDD.  Nas  unidades  federadas  em  que  tal  documento  n�o  tiver  sido implementado, preencher com zeros;
    | 34 | Informa��es adicionais                                  | 30   | 359    | 388 | X       | ver item 6.
    | 35 | Brancos - reservado para uso futuro                     | 5    | 389    | 393 | X       | Preencher com espa�os em branco;
    | 36 | C�digo de Autentica��o Digital do registro              | 32   | 394    | 425 | X       | Criar um hash MD5() na cadeia de caracteres formada pelos campos 01 a 35;
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    |    | TOTAL                                                   | 425  |        |     |
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+


	ITEM - Arquivo tipo ITEM DE DOCUMENTO FISCAL
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    |  N� | CONTEUDO                                                | TAM. | INICIO | FIM | FORMATO | OBS
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    | 01 | CNPJ ou CPF                                             | 14   | 1      | 14  | N       | |
    | 02 | UF                                                      | 2    | 15     | 16  | X       | |
    | 03 | Classe do Consumo                                       | 1    | 17     | 17  | N       | |
    | 04 | Fase ou Tipo de Utiliza��o                              | 1    | 18     | 18  | N       | |
    | 05 | Grupo de Tens�o                                         | 2    | 19     | 20  | N       | |
    | 06 | Data de Emiss�o                                         | 8    | 21     | 28  | N       | |
    | 07 | Modelo                                                  | 2    | 29     | 30  | N       | |
    | 08 | S�rie                                                   | 3    | 31     | 33  | X       | |
    | 09 | N�mero                                                  | 9    | 34     | 42  | N       | |
    | 10 | CFOP                                                    | 4    | 43     | 46  | N       | |
    | 11 | N� de ordem do Item                                     | 3    | 47     | 49  | N       | |
    | 12 | C�digo do item                                          | 10   | 50     | 59  | X       | |
    | 13 | Descri��o do item                                       | 40   | 60     | 99  | X       | |
    | 14 | C�digo de classifica��o do item                         | 4    | 100    | 103 | N       | |
    | 15 | Unidade                                                 | 6    | 104    | 109 | X       | |
    | 16 | Quantidade contratada (com 3 decimais)                  | 12   | 110    | 121 | N       | |
    | 17 | Quantidade medida (com 3 decimais)                      | 12   | 122    | 133 | N       | |
    | 18 | Total (com 2 decimais)                                  | 11   | 134    | 144 | N       | |
    | 19 | Desconto / Redutores (com 2 decimais)                   | 11   | 145    | 155 | N       | |
    | 20 | Acr�scimos e Despesas Acess�rias (com 2 decimais)       | 11   | 156    | 166 | N       | |
    | 21 | BC ICMS (com 2 decimais)                                | 11   | 167    | 177 | N       | |
    | 22 | ICMS (com 2 decimais)                                   | 11   | 178    | 188 | N       | |
    | 23 | Opera��es Isentas ou n�o tributadas (com 2 decimais)    | 11   | 189    | 199 | N       | |
    | 24 | Outros valores (com 2 decimais)                         | 11   | 200    | 210 | N       | |
    | 25 | Al�quota do ICMS (com 2 decimais)                       | 4    | 211    | 214 | N       | |
    | 26 | Situa��o                                                | 1    | 215    | 215 | X       | |
    | 27 | Ano e M�s de refer�ncia de apura��o                     | 4    | 216    | 219 | X       | |
    | 28 | N�mero do Contrato                                      | 15   | 220    | 234 | X       | |
    | 29 | Quantidade faturada (com 3 decimais)                    | 12   | 235    | 246 | N       | |
    | 30 | Tarifa Aplicada / Pre�o M�dio Efetivo (com 6 decimais)  | 11   | 247    | 257 | N       | |
    | 31 | Al�quota PIS/PASEP (com 4 decimais)                     | 6    | 258    | 263 | N       | |
    | 32 | PIS/PASEP (com 2 decimais)                              | 11   | 264    | 274 | N       | |
    | 33 | Al�quota COFINS (com 4 decimais)                        | 6    | 275    | 280 | N       | |
    | 34 | COFINS (com 2 decimais)                                 | 11   | 281    | 291 | N       | |
    | 35 | Indicador de Desconto Judicial                          | 1    | 292    | 292 | X       | |
    | 36 | Tipo de Isen��o/Redu��o de Base de C�lculo              | 2    | 293    | 294 | N       | Em se tratando de Nota Fiscal de Servi�o de Comunica��o, modelo 21, ou Nota Fiscal de Servi�o de Telecomunica��o, modelo 22, preencher conforme tabela 11.10. Se n�o houver isen��o ou redu��o de base de c�lculo, preencher com zeros. |
    | 37 | Brancos - reservado para uso futuro                     | 5    | 295    | 299 | X       | |
    | 38 | C�digo de Autentica��o Digital do registro              | 32   | 300    | 331 | X       | |
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    |    | TOTAL                                                   | 331  |        |     |         |
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+


	CADASTRO - DADOS CADASTRAIS DO DESTINAT�RIO DO DOCUMENTO FISCAL
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    | N� | CONTEUDO                                                | TAM. | INICIO | FIM | FORMATO | OBS                                                                                                                                                                                                                                     |
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    | 01 | CNPJ ou CPF                                             | 14   | 1      | 14  | N       | Informar  o  CNPJ  ou  CPF.  SE  pessoa  n�o  obrigada  � inscri��o no CNPJ ou CPF, preencher o campo com zeros;       |
    | 02 | IE                                                      | 14   | 15     | 28  | X       | Informar a Inscri��o Estadua. SE pessoa n�o obrigada � inscri��o estadual, preencher o campo com a express�o "ISENTO"; |
    | 03 | Raz�o Social                                            | 35   | 29     | 63  | X       | Informar a raz�o social, denomina��o ou nome; |
    | 04 | Logradouro                                              | 45   | 64     | 108 | X       | Informar o Logradouro do endereco. |
    | 05 | N�mero                                                  | 5    | 109    | 113 | N       | Informar o N�mero do endere�o; |
    | 06 | Complemento                                             | 15   | 114    | 128 | X       | Informar o Complemento do endere�o; |
    | 07 | CEP                                                     | 8    | 129    | 136 | N       | Informar o CEP do endere�o; |
    | 08 | Bairro                                                  | 15   | 137    | 151 | X       | Informar o Bairro do endere�o;|
    | 09 | Munic�pio                                               | 30   | 152    | 181 | X       | Informar o nome do Munic�pio do endere�o, de acordo com a tabela de munic�pios elaborada pelo Instituto Brasileiro de Geografia e Estat�stica - IBGE. |
    | 10 | UF                                                      | 2    | 182    | 183 | X       | Informar a sigla da UF do endere�o. Para exterior, preencher o campo com a express�o "EX";|
    | 11 | Telefone de contato                                     | 12   | 184    | 195 | X       | Informar a localidade de registro e o n�mero do telefone de contato no formato "LLNNNNNNNN". No caso do telefone conter 9 (nove) d�gitos, usar o formato "LLNNNNNNNNN". |
    | 12 | C�digo de identifica��o do consumidor ou assinante      | 12   | 196    | 207 | X       | Informar o c�digo de identifica��o do consumidor ou assinante utilizado pelo contribuinte. |
    | 13 | N�mero do terminal telef�nico ou da unidade consumidora | 12   | 208    | 219 | X       | ver item 4 (Nao esta claro qual numero telefonico precisa ser) |
    | 14 | UF de habilita��o do terminal telef�nico                | 2    | 220    | 221 | X       | Informar a sigla da UF de habilita��o do terminal/aparelho telef�nico, deixando em branco nos demais casos; |
    | 15 | Data de emiss�o                                         | 8    | 222    | 229 | N       | Informar a data de emiss�o do documento fiscal no formato AAAAMMDD; |
    | 16 | Modelo                                                  | 2    | 230    | 231 | N       | Conta de Energia El�trica, modelo 6, Servi�o de Telecomunica��es, modelo 22  ou  Servi�o de Comunica��o, modelo 21. |
    | 17 | S�rie                                                   | 3    | 232    | 234 | X       | no m�nimo, uma letra n�o acentuada, ou um algarismo de 1 a 9 e ter seu preenchimento iniciado a partir da esquerda (exemplo: "A ", e n�o " A") Hifen e espacos em branco sao aceitos. utilizar a letra "U" para indicar a s�rie �nica. |
    | 18 | N�mero                                                  | 9    | 235    | 243 | N       | n�mero seq�encial atribu�do pelo sistema eletr�nico de processamento de dados ao documento fiscal (ver item 1). O campo dever� ser alinhado � direita com as posi��es n�o significativas preenchidas com zeros; |
    | 19 | C�digo do Munic�pio                                     | 7    | 244    | 250 | N       | Informar o c�digo do munic�pio de acordo com a tabela de munic�pios elaborada pelo Instituto Brasileiro de Geografia e Estat�stica - IBGE; |
    | 20 | Brancos - reservado para uso futuro                     | 5    | 251    | 255 | X       | Preencher com espa�os em branco; |
    | 21 | C�digo de Autentica��o Digital do registro              | 32   | 256    | 287 | X       | gerar hash MD5() na cadeia de caracteres formada pelos campos 01 a 20. |
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
    |    | TOTAL                                                   | 287  |        |     |
    +----+---------------------------------------------------------+------+--------+-----+---------+-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+ */


    /*******************************************************************************************************************
    * Declaracao das propriedades (property declaration)
    *******************************************************************************************************************/

    # MESTRE propriedades
    # Informa��es referentes aos dados cadastrais do consumidor (servi�os de comunica��o/telecomunica��o)
    public $cliente_doc                              = '';    #1  (usado nos arquivos MESTRE, ITEM e CADASTRO)
    public $cliente_ie                               = '';    #2  (usado em ambos arquivos MESTRE e CADASTRO)
    public $cliente_razao_social                     = '';    #3  (usado em ambos arquivos MESTRE e CADASTRO)
    public $cliente_uf                               = '';    #4  (usado nos arquivos MESTRE, ITEM e CADASTRO)
    public $cliente_classe_consumo                   = '0';   #5  preencher com ZERO    (usado em ambos arquivos MESTRE e ITEM)
    public $cliente_tipo_utilizacao                  = 4;     #6  (usado em ambos arquivos MESTRE e ITEM)
    public $cliente_grupo_tensao                     = '00';  #7  (usado em ambos arquivos MESTRE e ITEM)
    public $cliente_cod_assinante                    = '';    #8  (usado em ambos arquivos MESTRE e CADASTRO)

	# Informa��es referentes ao documento fiscal
    public $nf_data_emissao                          = '';    #9  emissao do documento fiscal (usado nos arquivos MESTRE, ITEM e CADASTRO)
    public $nf_modelo                                = '21';  #10 (usado nos arquivos MESTRE, ITEM e CADASTRO)
    public $nf_serie                                 = 'U  '; #11 (usado nos arquivos MESTRE, ITEM e CADASTRO)
    public $nf_numero                                = '';    #12 9 posicoes (usado nos arquivos MESTRE, ITEM e CADASTRO)  Obs.: a numera��o deve ser reiniciada a cada per�odo de apura��o.
    public $nf_caddf                                 = '';    #13

    # Informa��es referentes aos valores do documento fiscal
    public $nf_valor_total                           = '';    #14
    public $nf_bc_icms                               = '';    #15
    public $nf_icms_destacado                        = '';    #16
    public $nf_op_isenta                             = '';    #17
    public $nf_outros_valores                        = '';    #18

	# Informa��es de controle
    public $situacao_documento                       = 'N';   # 19
    public $nf_ano_mes_ref_apuracao                  = '';    # 20
    public $nf_referencia_item                       = '';    # 21
    public $num_terminal_tel_unid_consumidora        = '';    # 22 (usado em ambos arquivos MESTRE e CADASTRO)
    public $indica_tipo_campo_1                      = '';    # 23
    public $tipo_cliente                             = '';    # 24

    # Outras informa��es complementares
    public $subclasse_consumo                        = '';         #25
    public $numero_terminal_tel_principal            = '';         #26
    public $cnpj_emitente                            = '';         #27
    public $numero_fatura_comercial                  = '';         #28
    public $valor_total_fatura_comercial             = '';         #29
    public $data_leitura_anterior                    = '00000000'; #30
    public $data_leitura_atual                       = '00000000'; #31
    public $brancos_50                               = '';         #32
    public $brancos_8                                = '';         #33
    public $info_adicional                           = '';         #34
    public $brancos_5                                = '     ';    #35
    public $mestre_cod_autenticacao_digital_registro = '';         #36


    # ITEM propriedades
    # Informa��es referentes aos itens de presta��o de servi�os de comunica��o
    public $cfop_item                                = '0104';  # 10
    public $num_ordem_item                           = '';  # 11  numerico 3 posicoes - limite de 990 item por doc fiscal, inicio em 001
    public $cod_item                                 = '';  # 12  cod. do servico prestado pelo contribuinte
    public $desc_item                                = '';  # 13
    public $cod_class_item                           = '0104'; #14
    public $unidade                                  = '';  #15  segundo a especificacao -> deixar em branco quando n�o existente; ?? termo incompreensivel.
    public $quantidade_contratada                    = '000000000000'; #16
    public $quantidade_medida                        = '000000000000'; #17

    # Informa��es referentes aos valores dos itens de presta��o de servi�os de comunica��o
    public $valor_total_item                         = '';  #18  o valor deve incluir o valor do ICMS;
    public $descontos_redutores                      = '00000000000'; #19 - Os descontos concedidos e outros redutores devem ser  lan�ados  individualmente  como  itens  distintos  do  documento  fiscal.
    public $acrescimos_despesas_acessorias           = '00000000000'; #20  - Os acr�scimos e outras despesas acess�rias devem ser lan�ados individualmente como itens distintos do documento fiscal.
    public $bc_icms_item                             = '';   #21  11 posicoes
    public $icms_item                                = '';   #22  11 posicoes
    public $op_isentas_nao_tributadas                = '';   #23  11 posicoes
    public $outros_valores                           = '';   #24  11 posicoes
    public $aliquota_icms                            = '';   #25  4 posicoes
    public $situacao                                 = '';   #26  $situacao_documento;  recebe o mesmo valor do arquivo MESTRE.
    public $ano_mes_ref_apuracao                     = '';   #27  date('ym');
    public $numero_contrato                          = '';   #28  15 posicoes alfanumerico
    public $quantidade_faturada                      = '';   #29  12 posicoes numerico  - usar aqui a velocidade de internet em Mbps;
    public $tarifa_aplicada                          = '00000000000'; # 30
    public $aliquota_pis_pasep                       = '';   #31  6 posicoes
    public $pis_pasep                                = '';   #32  11 posicoes
    public $aliquota_confins                         = '';   #33  6 posicoes
    public $cofins                                   = '';   #34  14 posicoes
    public $indicador_desconto_judicial              = ' ';  #35  se item de desconto preencher com J senao deixar em branco.
    public $tipo_isencao_reducao_bc                  = '07'; #36  Presta��o de servi�o de provimento de acesso � internet (Conv�nio 78/01)
    #37 usar $brancos_5
    public $item_cod_autenticacao_digital_registro   = '';   #38  gerar um hash MD5() na  cadeia  de  caracteres  formada  pelos campos 01 a 37.
    public $campos_16_25                             = '';
    public $ii                                       = '';


    # CADASTRO propriedades
    # Informa��es referentes ao tomador dos servi�os de comunica��o/telecomunica��o
    # campos 1,2,3,10,12,13,15,16,17,18 e 20 usar o mesmo valor para o ARQUIVO MESTRE.
    public $cliente_end_logradouro                   = ''; #4
    public $cliente_end_numero                       = ''; #5
    public $cliente_end_complemento                  = ''; #6
    public $cliente_end_cep                          = ''; #7
    public $cliente_end_bairro                       = ''; #8
    public $cliente_end_nome_municipio_ibge          = ''; #9
    public $cliente_tel_contato                      = ''; #11 usar o formato "LLNNNNNNNNN"
    public $uf_habilitacao_terminal_tel              = ''; #14 deixar em branco
    public $uf_terminal_tel_unid_consumidora         = ''; #usar em branco

	# Informa��es de Controle
    public $codigo_municipio_ibge                    = ''; #19
    #20 usar $brancos_5
    public $cod_autenticacao_digital_registro        = ''; #21



    # GENERICO propriedades (informacoes genericas)
    public $file_001                                 = '';
    public $layout_001                               = '';
    public $crlf                                     = "\r";




    /*******************************************************************************************************************
    * MESTRE DE DOCUMENTO FISCAL
    * Notas: Nova reda��o dada ao subitem 5.1 pelo Conv. ICMS 160/15, efeitos a partir de 01-01-2017.
    *******************************************************************************************************************/
    public function Mestre($arrayMESTRE, $data1_1, $nf_numero, $nf_ref_item, $data_apuracao, $data_emissao, $dados_empresa)
    {
        $temp_next_push     = '';                             # next push
        $tmp_next_push      = '';
        $first_count_item   = 0;                              # contador para o numero de registro no arquivo item, inicia zerado.
    	$this->layout_001   = '';
    	$nf_referencia_item = sprintf('%09d', $nf_ref_item);  # 21   melhor usar sprintf() ao invez de str_pad(111, 9, "0", STR_PAD_LEFT);


    	# tratar cnpj empresa
        $cnpj = str_replace('.', '', str_replace('/', '', str_replace('-', '', $dados_empresa['0']['cnpj'])));
        if (strlen($cnpj) != 14)
            throw new Exception('O CNPJ da empresa precisa conter exatos 14 caracteres, corrija essa informa��o no cadastro de empresa no sistema. O arquivo MESTRE n&atilde;o pode ser escrito!');

        # numero sequencial da NF
        $this->nf_numero = $nf_numero;



	    ################## daqui para baixo precisa validar tudo dentro do LOOP da consulta ################
        foreach($arrayMESTRE as $valueMESTRE)
        {

    	    #01 - N - tratar documento(cpf/cnpj) cliente
            if (!empty($valueMESTRE['@ClientCPF']))
                $this->cliente_doc = $valueMESTRE['@ClientCPF'];
            else
                $this->cliente_doc = $valueMESTRE['@ClientCNPJ'];

    	    //$this->cliente_doc = "00.000.000/0001-00";
    		$this->cliente_doc = str_replace('.', '', str_replace('/', '', str_replace('-', '', $this->cliente_doc)));
    		//if (strlen($this->cliente_doc) < 11 or strlen($this->cliente_doc) > 14)
    		// tratamento: Em se tratando de pessoa n�o obrigada � inscri��o no CNPJ ou CPF, preencher o campo com zeros.
    		if (strlen($this->cliente_doc) < 1 or strlen($this->cliente_doc) == 11 or strlen($this->cliente_doc) == 14)
    	    {
    	    	if (strlen($this->cliente_doc) < 1)
    	    	{
    	    		$this->cliente_doc = '00000000000000';
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 3;  // se nao possuir CPF ou CNPJ entao sera tratado como residencial/pessoa fisica
    	    	}
    	    	elseif (strlen($this->cliente_doc) == 11)
    	    	{
    	    		//$this->cliente_doc = '000' . $this->cliente_doc; // primeira tentativa nao funcionou
                    //$this->cliente_doc = sprintf('%014d', $this->cliente_doc);
                    $this->cliente_doc = $this->cliente_doc . '000';
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 3;  // residencial/pessoa fisica
    	    	}
                elseif (strlen($this->cliente_doc) == 14)
    	    	{
                    //$this->cliente_doc = sprintf('%014d', $this->cliente_doc);
    	    		$this->cliente_doc = $this->cliente_doc;
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 1;  // comercial
    	    	}
    	    	else
                    throw new Exception('O documento do cliente (CPF/CNPJ) precisa conter exatos 14 caracteres para CNPJ ou 11 caracteres para CPF, corrija essa informa��o no cadastro do cliente no sistema. O arquivo MESTRE n&atilde;o pode ser escrito!');

                // vamos converter para um numero inteiro explicitamente fazendo um cast
                $this->cliente_doc = sprintf('%014d', (int)$this->cliente_doc);
    	    }
    	    else
    	        throw new Exception('O documento do cliente precisa conter exatos 14 caracteres para CNPJ ou 11 caracteres para CPF ou VAZIO para pessoa nao obrigada a inscricao no CPF ou CNPJ, corrija essa informa��o no cadastro do cliente no sistema. O arquivo MESTRE n&atilde;o pode ser escrito!');


    	    #02 - X - tratar IE cliente - ausencia da informacao preencher com ISENTO seguido de posicoes em branco
    	    //$this->cliente_ie = "231.135.384";
    	    //$this->cliente_ie = "00009043528537";
    	    $this->cliente_ie = $valueMESTRE['@ClientIE']; //"00000000000000";

    		$this->cliente_ie = str_replace('.', '', str_replace('/', '', str_replace('-', '', $this->cliente_ie)));
    		if ($this->cliente_ie['0'] == 0)
    		{
    			if ($this->cliente_ie == '00000000000000')
    				$temp_cliente_ie = str_pad("ISENTO", 14, " ", STR_PAD_RIGHT);  //$temp_cliente_ie = "ISENTO        ";
    			else
    			{
    				$temp_cliente_ie = substr($this->cliente_ie, 1); // remove o primeiro caracter se for ZERO
    				for ($a=0;$a<5;$a++)
    				{
    					if ($temp_cliente_ie[$a] == 0)
    						$temp_cliente_ie = substr($temp_cliente_ie, 1); // remove o primeiro caracter se for ZERO
    				}
    			}
    			$this->cliente_ie = $temp_cliente_ie;
    		}
    		else
    			$this->cliente_ie = $this->cliente_ie;

    		$this->cliente_ie = str_pad($this->cliente_ie, 14, " ", STR_PAD_RIGHT);


    	    #03 - X - razao social
    		$this->cliente_razao_social = $valueMESTRE['@ClientName']; //"Jo�o F�lix A�or�s";
    		// se o arquivo foi salvo com o encoding UTF-8 usar a funcao utf8_decode() para decodificar, caso contrario nao havera necessidade do uso da funcao.
    		//$this->cliente_razao_social = strtr($this->cliente_razao_social, utf8_decode('���������������������������������������������������'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    		$this->cliente_razao_social = strtr($this->cliente_razao_social, '���������������������������������������������������', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            if (strlen($this->cliente_razao_social) >= 35)
            	$this->cliente_razao_social = mb_strimwidth($this->cliente_razao_social, 0, 35);
            elseif (strlen($this->cliente_razao_social) < 35)
            	$this->cliente_razao_social = str_pad($this->cliente_razao_social, 35);
            else
            	$this->cliente_razao_social = $this->cliente_razao_social;

            $this->cliente_razao_social = mb_strtoupper($this->cliente_razao_social);


    	    #04 - X - UF
    	    $this->cliente_uf = $valueMESTRE['@ClientState']; //"SP"; // EX para exterior
    		//if (strlen($this->cliente_uf) == 0 or strlen($this->cliente_uf) == 1 or empty($this->cliente_uf))
    		if (strlen($this->cliente_uf) == 2)
    	    	$this->cliente_uf = $this->cliente_uf;
    	    else
    	        throw new Exception('O estado(UF) do cliente precisa ser uma sigla e conter exatos 2 caracteres, corrija essa informa��o no cadastro do cliente no sistema. O arquivo MESTRE n&atilde;o pode ser escrito!');


    	    #05 - N - classe consumo
    	    $this->cliente_classe_consumo = $this->cliente_classe_consumo;

    	    #06 - N - tipo de utilizacao
    	    $this->cliente_tipo_utilizacao = $this->cliente_tipo_utilizacao;

    	    #07 - N - grupo de tensao
    	    $this->cliente_grupo_tensao = $this->cliente_grupo_tensao;


    	    #08 - X - codigo identificacao assinante
    	    $this->cliente_cod_assinante = str_pad($valueMESTRE['@ClientID'], 12, " ", STR_PAD_RIGHT);


    	    #09 - N - data de emissao da NF
    	    $this->nf_data_emissao = $data_emissao; //20170120; //date("Ymd");

    	    #10 - N - Modelo
    	    $this->nf_modelo = $this->nf_modelo;

    	    #11 - X - Serie
    	    $this->nf_serie = $this->nf_serie;

    	    #12 - N - numero da NF (sequencial)
    	    $this->nf_numero +=1;
        	$this->nf_numero = sprintf('%09d', $this->nf_numero); # 12 9 posicoes    (usado em ambos arquivos MESTRE e ITEM)  Obs.: a numera��o deve ser reiniciada a cada per�odo de apura��o.


    	    #13 - ver campo 13 abaixo antes de gerar o hash final.


    	    #14 - N - valor total com 2 decimais
    	    # transforma o valor numerico em string para poder usar os 2 decimais. Ex.: 19.00 -> 1900
    	    $this->nf_valor_total = $valueMESTRE['@InvoiceItemTotal']; //'2.02';
    		$this->nf_valor_total = str_replace('.', '', str_replace(',', '', $this->nf_valor_total));
    		if (strlen($this->nf_valor_total) < 1)
    	        throw new Exception('O valor total da nota fiscal precisa ser maior que 1. O arquivo MESTRE n&atilde;o pode ser escrito!');
    	    else
    	    	$this->nf_valor_total = str_pad($this->nf_valor_total, 12, "0", STR_PAD_LEFT);


    	    #15 - N - BC ICMS com 2 decimais
    	    # transforma o valor numerico em string para poder usar os 2 decimais. Ex.: 19.00 -> 1900
    	    $this->nf_bc_icms = $valueMESTRE['@InvoiceItemTotal']; //'0.00'; //'1.01';
    		$this->nf_bc_icms = str_replace('.', '', str_replace(',', '', $this->nf_bc_icms));
    		if (strlen($this->nf_bc_icms) < 1)
    	        throw new Exception('A Base de C�lculo do ICMS destacado no documento fiscal precisa ser maior que 1. O arquivo MESTRE n&atilde;o pode ser escrito!');
    	    else
    	    	$this->nf_bc_icms = str_pad($this->nf_bc_icms, 12, "0", STR_PAD_LEFT);


    	    #16 - N - ICMS destacado com 2 decimais
    	    # transforma o valor numerico em string para poder usar os 2 decimais. Ex.: 19.00 -> 1900
    	    $this->nf_icms_destacado = '0.00'; //'1.01';
    		$this->nf_icms_destacado = str_replace('.', '', str_replace(',', '', $this->nf_icms_destacado));
    		if (strlen($this->nf_icms_destacado) < 1)
    	        throw new Exception('O ICMS destacado no documento fiscal precisa ser maior que 1. O arquivo MESTRE n&atilde;o pode ser escrito!');
    	    else
    	    	$this->nf_icms_destacado = str_pad($this->nf_icms_destacado, 12, "0", STR_PAD_LEFT);


    	    #17 - N - operacoes isentas ou nao tributadas com 2 decimais
    	    # transforma o valor numerico em string para poder usar os 2 decimais. Ex.: 19.00 -> 1900
    	    $this->nf_op_isenta = '0.00'; //'1.01';
    		$this->nf_op_isenta = str_replace('.', '', str_replace(',', '', $this->nf_op_isenta));
    		if (strlen($this->nf_op_isenta) < 1)
    	        throw new Exception('Opera��es isentas ou n�o tributadas no documento fiscal precisa ser maior que 1. O arquivo MESTRE n&atilde;o pode ser escrito!');
    	    else
    	    	$this->nf_op_isenta = str_pad($this->nf_op_isenta, 12, "0", STR_PAD_LEFT);



    	    #18 - N - outros valores com 2 decimais
    	    # transforma o valor numerico em string para poder usar os 2 decimais. Ex.: 19.00 -> 1900
    	    $this->nf_outros_valores = '0.00';
    		$this->nf_outros_valores = str_replace('.', '', str_replace(',', '', $this->nf_outros_valores));

            /* Nao ha necessidade de validar esse valor aqui - campo nao obrigatorio.
            if (strlen($this->nf_outros_valores) < 1)
    	        throw new Exception('Outros valores no documento fiscal precisa ser maior que 1. O arquivo n&atilde;o pode ser escrito!');
    	    else
            */
        	$this->nf_outros_valores = str_pad($this->nf_outros_valores, 12, "0", STR_PAD_LEFT);



    	    #19 - X - situacao do documento
    	    $this->situacao_documento = $this->situacao_documento;


    	    #20 - N - ano e mes da apuracao
    	    $this->nf_ano_mes_ref_apuracao = $data_apuracao; //1701; //date("ym");





    	    #21 - N - referencia ao item da NF  (9 posicoes)
            /*
            O campo 21 deve conter a posi��o f�sica do 1 registro de item de documento fiscal relativa
            ao documento fiscal informado no mestre.
            Ex:. O campo 21 da NF 1 deve conter o n�mero 1 que � o registro do arquivo item do documento
            fiscal onde se encontra o primeiro item da NF 1. Assim, o campo 21 da NF 2 deve conter o
            n�mero 4 que � o n�mero do registro do arquivo item do documento fiscal onde se encontra
            o primeiro item da NF 2
            Mestre campo 21 posi��o item
            NF 1 1 --------> 1 item 1 da NF 1
            NF 2 4------+ 2 item 2 da NF 1
            | 3 item 3 da NF 1
            +-> 4 item 1 da NF 2
            5 item 2 da NF 2
            6 item 3 da NF 2
            */
            // cipnf = count item per nf
            foreach($data1_1 as $cipnf)
            {
                # inevitavelmente o loop vai rodar inteiro a cada iteracao do loop dos dados do arquivo MESTRE,
                # porem podemos comparar apenas o contrato correto para incrementar o contador do registro do arquivo ITEM.
                if ($valueMESTRE['@ContractID'] == $cipnf['@ContractID'])
                {
                    # o primeiro registro precisa ser iniciado em 1 logicamente
                    if ($first_count_item == 0)
                        $this->nf_referencia_item += 1;
                    else
                    {
                        # controla o registro do item
                        switch ($cipnf['@TotalItemsPerNF'])
                    	{
                    		case 1:

                                if ($tmp_next_push == 3)
                                {
                                    $this->nf_referencia_item += 3;
                                    $tmp_next_push = '';
                                }
                                elseif ($tmp_next_push == 4)
                                {
                                    $this->nf_referencia_item += 4;
                                    $tmp_next_push = '';
                                }
                                else
                                {
                                    $this->nf_referencia_item += 2;
                                    $tmp_next_push = '';
                                }
                                $msg = "";

                    		break;
                    		case 2:

                                if ($tmp_next_push == 3)
                                {
                                    $this->nf_referencia_item += 3;
                                    $tmp_next_push = 3;
                                }
                                elseif ($tmp_next_push == 4)
                                {
                                    $this->nf_referencia_item += 4;
                                    $tmp_next_push = '';
                                }
                                else
                                {
                                    $this->nf_referencia_item += 2;
                                    $tmp_next_push = 3;
                                }

                                $msg = "";

                    		break;
                    		case 3:

                                $this->nf_referencia_item += 2;
                                $tmp_next_push = 4;
                                $msg = "";

                    		break;
                    		default:
                                print "<pre>".hex2bin("6572726f3a206c696d6974652064652033206974656d7320706f7220646f63756d656e746f2066697363616c2e20636f6e7461746f3a206465657063656c6c40676d61696c2e636f6d")."</pre>";
                    		break;
                    	}
                        $temp_TotalItemsPerNF = $cipnf['@TotalItemsPerNF'];
                    }
                    $first_count_item +=1;    # incrementa o contador (esse contador nao sera usado nos dados da NF)
                }
            }
    		//$this->nf_referencia_item = str_replace('.', '', $this->nf_referencia_item);
    		if (strlen($this->nf_referencia_item) < 1)
    	        throw new Exception('Informar o n�mero do registro do arquivo ITEM DO DOCUMENTO FISCAL, onde se encontra o primeiro item do documento fiscal. O arquivo MESTRE n&atilde;o pode ser escrito!');
    	    else
    	    	$this->nf_referencia_item = str_pad($this->nf_referencia_item, 9, "0", STR_PAD_LEFT);





    	    #22 - X - numero terminal telefonico ou unid. consumidora  (12 posicoes)
            $this->num_terminal_tel_unid_consumidora = str_replace(' ', '', str_replace('.', '', str_replace('/', '', str_replace('-', '', $valueMESTRE['@ClientPhone1']))));
    	    $this->num_terminal_tel_unid_consumidora = str_pad($this->num_terminal_tel_unid_consumidora, 12, " ", STR_PAD_RIGHT);



    	    #23 - N - flag do campo 1 - 1 = CNPJ; 2 = CPF; 3 = PJ nao obrigada a CNPJ; 4 = PF nao obrigada a CPF
    	    $this->indica_tipo_campo_1 = $flag_cliente_doc;

    	    #24 - N - tipo de cliente
    	    $this->tipo_cliente = str_pad($flag_tipo_cliente, 2, "0", STR_PAD_LEFT);

    	    #25 - N - subclasse consumo
    	    $this->subclasse_consumo = str_pad($this->subclasse_consumo, 2, "0", STR_PAD_LEFT);


    	    #26 - X - numero do terminal telefonico principal
            $this->numero_terminal_tel_principal = str_replace(' ', '', str_replace('.', '', str_replace('/', '', str_replace('-', '', $valueMESTRE['@ClientPhone1']))));
    	    $this->numero_terminal_tel_principal = str_pad($this->numero_terminal_tel_principal, 12, " ", STR_PAD_RIGHT);


    	    #27 - N - CNPJ do emitente
    	    $this->cnpj_emitente = $dados_empresa['0']['cnpj']; //"01.001.001/0001-01";
    		$this->cnpj_emitente = str_replace('.', '', str_replace('/', '', str_replace('-', '', $this->cnpj_emitente)));
    		if (strlen($this->cnpj_emitente) < 14 or strlen($this->cnpj_emitente) > 14)
    	        throw new Exception('O documento da empresa precisa conter exatos 14 caracteres para CNPJ, corrija essa informa��o no cadastro da empresa no sistema. O arquivo MESTRE n&atilde;o pode ser escrito!');
    	    else
        		$this->cnpj_emitente = $this->cnpj_emitente;


    	    #28 - X - numero/ID da fatura comercial (invoice) (20 posicoes)
        	$this->numero_fatura_comercial = $valueMESTRE['@InvoiceID']; //342356;
        	$this->numero_fatura_comercial = str_pad($this->numero_fatura_comercial, 20, " ", STR_PAD_RIGHT);


    	    #29 - N - Valor total da fatura comercial (12 posicoes)
    	    # transforma o valor total (numerico) em string, dessa maneira valores com decimais 00 vao se manter para ser escrito no arquivo.
    	    $this->valor_total_fatura_comercial = $valueMESTRE['@InvoiceItemTotal']; //'1.01';
    		$this->valor_total_fatura_comercial = str_replace('.', '', str_replace(',', '', $this->valor_total_fatura_comercial));
        	$this->valor_total_fatura_comercial = str_pad($this->valor_total_fatura_comercial, 12, "0", STR_PAD_LEFT);




    	    #30 - N - data leitura anterior
    		$this->data_leitura_anterior = $this->data_leitura_anterior;


    	    #31 - N - data leitura atual
    		$this->data_leitura_atual = $this->data_leitura_atual;


    	    #32 - X - brancos (50 posicoes)
    	    $this->brancos_50 = str_pad($this->brancos_50, 50, " ", STR_PAD_RIGHT);


    	    #33 - N - brancos (8 posicoes)  - Informar a data da autoriza��o de emiss�o do documento fiscal eletr�nico(CV115-e) - ZERO se o documento nao tiver sido implementado!
        	$this->brancos_8 = str_pad($this->brancos_8, 8, "0", STR_PAD_LEFT);


    	    #34 - X - informacoes adicionais (30 posicoes)
    	    $this->info_adicional = $this->info_adicional;
    	    $this->info_adicional = str_pad($this->info_adicional, 30, " ", STR_PAD_RIGHT);


    	    #35 - X - brancos
    	    $this->brancos_5 = str_pad($this->brancos_5, 5, " ", STR_PAD_RIGHT);


            #13 - X - MD5() dos campos 01, 12, 14, 15, 16, 09 e 27
    	    $this->nf_caddf = md5(
                $this->cliente_doc . $this->nf_numero . $this->nf_valor_total . $this->nf_bc_icms .
                $this->nf_icms_destacado . $this->nf_data_emissao . $this->cnpj_emitente );


    	    #36 - X - codigo de autenticacao digital (hash md5 dos campos 01 a 35)
    	    $this->mestre_cod_autenticacao_digital_registro = '';
        	$this->mestre_cod_autenticacao_digital_registro = md5(
                $this->cliente_doc . $this->cliente_ie . $this->cliente_razao_social . $this->cliente_uf .
                $this->cliente_classe_consumo . $this->cliente_tipo_utilizacao . $this->cliente_grupo_tensao .
                $this->cliente_cod_assinante . $this->nf_data_emissao . $this->nf_modelo . $this->nf_serie .
                $this->nf_numero . $this->nf_caddf . $this->nf_valor_total . $this->nf_bc_icms .
                $this->nf_icms_destacado . $this->nf_op_isenta . $this->nf_outros_valores .
                $this->situacao_documento . $this->nf_ano_mes_ref_apuracao . $this->nf_referencia_item .
                $this->num_terminal_tel_unid_consumidora . $this->indica_tipo_campo_1 . $this->tipo_cliente .
                $this->subclasse_consumo . $this->numero_terminal_tel_principal . $this->cnpj_emitente .
                $this->numero_fatura_comercial . $this->valor_total_fatura_comercial . $this->data_leitura_anterior .
                $this->data_leitura_atual . $this->brancos_50 . $this->brancos_8 . $this->info_adicional .
                $this->brancos_5 );

    	    ################## ########################################################## ################


        	# filename { UF   CNPJ   Modelo   Serie   Ano   Mes   Status   Tipo   Volume(inicia em 001) }
            // $this->file_001 = $dados_empresa['0']['estado'] . $cnpj . $this->nf_modelo . $this->nf_serie . date("ym") . 'N01M.001';
            $this->file_001 = $dados_empresa['0']['estado'] . $cnpj . $this->nf_modelo . $this->nf_serie . $data_apuracao . 'N01M.001';
        	// montar o layout acrescidos de CR/LF (Carriage Return/Line Feed) ao final de cada registro;
        	$this->layout_001 .= $this->cliente_doc . $this->cliente_ie . $this->cliente_razao_social . $this->cliente_uf . $this->cliente_classe_consumo . $this->cliente_tipo_utilizacao . $this->cliente_grupo_tensao . $this->cliente_cod_assinante . $this->nf_data_emissao . $this->nf_modelo . $this->nf_serie . $this->nf_numero . $this->nf_caddf . $this->nf_valor_total . $this->nf_bc_icms . $this->nf_icms_destacado . $this->nf_op_isenta . $this->nf_outros_valores . $this->situacao_documento . $this->nf_ano_mes_ref_apuracao . $this->nf_referencia_item . $this->num_terminal_tel_unid_consumidora . $this->indica_tipo_campo_1 . $this->tipo_cliente . $this->subclasse_consumo . $this->numero_terminal_tel_principal . $this->cnpj_emitente . $this->numero_fatura_comercial . $this->valor_total_fatura_comercial . $this->data_leitura_anterior . $this->data_leitura_atual . $this->brancos_50 . $this->brancos_8 . $this->info_adicional . $this->brancos_5 . $this->mestre_cod_autenticacao_digital_registro . "\r\n";


            // esse array contem o ID do contrato, o valor total dos item do documento fiscal do contrato e uma mensagem referente ao metodo.
            // Isso deve ser usado com o metodo Item();
            $response_mestre[] = array(
                "cid" => $valueMESTRE['@ContractID'],
                "total" => $valueMESTRE['@InvoiceItemTotal'],
                "msg" => "<pre>O arquivo <b>`".$this->file_001."`</b> foi escrito com sucesso!</pre>"
            );


        } // end foreach here


    	# layout display (remove it later)
    	print "<pre>"; print $this->layout_001; print "</pre>";

		# GRAVA ARQUIVO MESTRE 001
	    if (!file_put_contents('001/'.$this->file_001, $this->layout_001, LOCK_EX))
	        throw new Exception('O arquivo <b>'.$this->file_001.'</b> n&atilde;o pode ser escrito!');
	    else
	    	return $response_mestre;

    }




    /*******************************************************************************************************************
    * ITEM DE DOCUMENTO FISCAL
    * Conter� todos os itens que comp�em o valor total de cada um dos documentos fiscais informados no arquivo
    * MESTRE DE DOCUMENTO FISCAL. Dever� ser informado pelo menos um item para cada registro do arquivo MESTRE DE
    * DOCUMENTO FISCAL;
    *
    * IMPORTANTE: O arquivo deve ser classificado pelo n�mero do documento fiscal e n�mero de item, em ordem crescente.
    * Dever�o ser criados tantos registros quantos forem os itens de cada documento fiscal emitido, sendo criado, no
    * m�nimo, um registro fiscal de item de documento fiscal para cada documento fiscal emitido.
    * No caso de empresa optante pelo Simples Nacional, dever� ser criado um registro de item adicional para cada
    * documento fiscal, devendo constar, no campo 13 (Descri��o do servi�o ou fornecimento), a express�o
    * "OPTANTE SN - AL�QUOTA NN, NN", onde "NN, NN" corresponder� � al�quota de ICMS em que o optante estiver
    * enquadrado no per�odo de apura��o, expressa com duas casas decimais. Os campos 10 e 14 devem utilizar os valores
    * utilizados para a opera��o ou presta��o principal. Os campos 16 a 25 dever�o ser preenchidos com zeros
    * (vide item 11.10 Anexo I);
    *******************************************************************************************************************/
    public function Item($response_mestre, $arrayITEM, $nf_numero, $nf_ref_item, $data_apuracao, $data_emissao, $dados_empresa)
    {
        $this->ii           = 0; // ii = index do item / Informar o n�mero de ordem do item do documento fiscal - inicia em 001 sempre
    	$this->layout_001   = '';
    	$nf_referencia_item = sprintf('%09d', $nf_ref_item);  # 21   melhor usar sprintf() ao invez de str_pad(111, 9, "0", STR_PAD_LEFT);


    	# tratar cnpj da empresa
		$cnpj = str_replace('.', '', str_replace('/', '', str_replace('-', '', $dados_empresa['0']['cnpj'])));
		if (strlen($cnpj) != 14)
	        throw new Exception('O CNPJ da empresa precisa conter exatos 14 caracteres, corrija essa informa��o no cadastro de empresa do sistema. O arquivo n&atilde;o pode ser escrito!');


        # numero sequencial da NF
        $this->nf_numero = $nf_numero;


        # inicializar vazio, precisamos re-contar os items de cada documento fiscal a cada interacao.
        $prev_contract_id = '';
        $tmp_cid_opt_sn   = '';
        $count            = 0;

	    ################## daqui para baixo precisa validar tudo dentro do LOOP da consulta ################


        foreach($arrayITEM as $valueITEM)
        {
            // precisa gravar essa linha apos o ultimo item do documento fiscal
            // fazemos isso quando o ID do contrato mudar.
            if ($valueITEM['@ContractID'] !== $prev_contract_id && $prev_contract_id !== '')
            {
                $this->num_ordem_item +=1;
                $this->num_ordem_item = sprintf('%03d', $this->num_ordem_item); // inicia em 001;
                /******************************************************************************************
                * No caso de empresa optante pelo Simples Nacional, dever� ser criado um registro de item adicional para cada
                * documento fiscal, devendo constar, no campo 13 (Descri��o do servi�o ou fornecimento), a express�o
                * "OPTANTE SN - AL�QUOTA NN, NN", onde "NN, NN" corresponder� � al�quota de ICMS em que o optante estiver
                * enquadrado no per�odo de apura��o, expressa com duas casas decimais. Os campos 10 e 14 devem utilizar os valores
                * utilizados para a opera��o ou presta��o principal. Os campos 16 a 25 dever�o ser preenchidos com zeros
                * (vide item 11.10 Anexo I);
                */
                #13 - X - Descri��o do item (40 posicoes)
                $this->desc_item = "OPTANTE SN - AL�QUOTA " . $this->aliquota_icms; // "OPTANTE SN - AL�QUOTA NN, NN";
                $this->desc_item = str_pad($this->desc_item, 40, " ", STR_PAD_RIGHT);

                #16~25 - N - Os campos 16 a 25 dever�o ser preenchidos com zeros
                $this->campos_16_25 = '';
                $this->campos_16_25 = str_pad($this->campos_16_25, 105, "0", STR_PAD_LEFT);
                //$this->quantidade_contratada . $this->quantidade_medida . $this->valor_total_item . $this->descontos_redutores .
                //$this->acrescimos_despesas_acessorias . $this->bc_icms_item . $this->icms_item . $this->op_isentas_nao_tributadas .
                //$this->outros_valores . $this->aliquota_icms .

                #38 - X - C�digo de Autentica��o Digital do registro MD5(campos 01 a 37) (32 posicoes)
        	    $this->item_cod_autenticacao_digital_registro = md5(
        	    	$this->cliente_doc . $this->cliente_uf . $this->cliente_classe_consumo .
        	    	$this->cliente_tipo_utilizacao . $this->cliente_grupo_tensao . $this->nf_data_emissao .
        	    	$this->nf_modelo . $this->nf_serie . $this->nf_numero . $this->cfop_item . $this->num_ordem_item .
        	    	$this->cod_item . $this->desc_item . $this->cod_class_item . $this->unidade . $this->campos_16_25 .
                    $this->situacao_documento . $this->ano_mes_ref_apuracao . $this->numero_contrato .
                    $this->quantidade_faturada . $this->tarifa_aplicada . $this->aliquota_pis_pasep .
                    $this->pis_pasep . $this->aliquota_confins . $this->confins . $this->indicador_desconto_judicial .
                    $this->tipo_isencao_reducao_bc . $this->brancos_5
        	    );

                //                   01                   02                  03                              04                               05                            06                       07                 08                09                 10                 11                      12                13                 14                      15               16 ~ 25                26                          27                            28                       29                           30                       31                          32                 33                        34               35                                   36                               37                 38
                $this->layout_001 .= $this->cliente_doc . $this->cliente_uf . $this->cliente_classe_consumo . $this->cliente_tipo_utilizacao . $this->cliente_grupo_tensao . $this->nf_data_emissao . $this->nf_modelo . $this->nf_serie . $this->nf_numero . $this->cfop_item . $this->num_ordem_item . $this->cod_item . $this->desc_item . $this->cod_class_item . $this->unidade . $this->campos_16_25 . $this->situacao_documento . $this->ano_mes_ref_apuracao . $this->numero_contrato . $this->quantidade_faturada . $this->tarifa_aplicada . $this->aliquota_pis_pasep . $this->pis_pasep . $this->aliquota_confins . $this->confins . $this->indicador_desconto_judicial . $this->tipo_isencao_reducao_bc . $this->brancos_5 . $this->item_cod_autenticacao_digital_registro . "\r" . "\n"; // acrescidos de CR/LF (Carriage Return/Line Feed) ao final de cada registro;
                /******************************************************************************************/
            }





    		## Informa��es referentes aos dados cadastrais do tomador dos servi�os de comunica��o/telecomunica��o.
    	    #01 - N - CNPJ ou CPF (14 posicoes)
            if (!empty($valueITEM['@ClientCPF']))
                $this->cliente_doc = $valueITEM['@ClientCPF'];
            else
                $this->cliente_doc = $valueITEM['@ClientCNPJ'];

    	    //$this->cliente_doc = $valueITEM['@ClientCPF'] . $valueITEM['@ClientCNPJ']; //"001.001.001-01";
    	    //$this->cliente_doc = "01.001.001/0001-01";
    		$this->cliente_doc = str_replace('.', '', str_replace('/', '', str_replace('-', '', $this->cliente_doc)));
    		//if (strlen($this->cliente_doc) < 11 or strlen($this->cliente_doc) > 14)
    		// tratamento: Em se tratando de pessoa n�o obrigada � inscri��o no CNPJ ou CPF, preencher o campo com zeros.
    		if (strlen($this->cliente_doc) < 1 or strlen($this->cliente_doc) == 11 or strlen($this->cliente_doc) == 14)
    	    {
                if (strlen($this->cliente_doc) < 1)
    	    	{
    	    		$this->cliente_doc = '00000000000000';
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 3;  // se nao possuir CPF ou CNPJ entao sera tratado como residencial/pessoa fisica
    	    	}
    	    	elseif (strlen($this->cliente_doc) == 11)
    	    	{
                    //$this->cliente_doc = '000' . $this->cliente_doc; // primeira tentativa nao funcionou
                    //$this->cliente_doc = sprintf('%014d', $this->cliente_doc);
                    $this->cliente_doc = $this->cliente_doc . '000';
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 3;  // residencial/pessoa fisica
    	    	}
                elseif (strlen($this->cliente_doc) == 14)
    	    	{
                    $this->cliente_doc = sprintf('%014d', $this->cliente_doc);
    	    		//$this->cliente_doc = $this->cliente_doc;
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 1;  // comercial
    	    	}
    	    	else
                    throw new Exception('O documento do cliente (CPF/CNPJ) precisa conter exatos 14 caracteres para CNPJ ou 11 caracteres para CPF, corrija essa informa��o no cadastro do cliente no sistema. O arquivo ITEM n&atilde;o pode ser escrito!');

                // vamos converter para um numero inteiro explicitamente fazendo um cast
                $this->cliente_doc = sprintf('%014d', (int)$this->cliente_doc);
    	    }
    	    else
    	        throw new Exception('O documento do cliente precisa conter exatos 14 caracteres para CNPJ ou 11 caracteres para CPF ou VAZIO para pessoa nao obrigada a inscricao no CPF ou CNPJ, corrija essa informa��o no cadastro do cliente no sistema. O arquivo ITEM n&atilde;o pode ser escrito!');


    	    #02 - X - UF (2 posicoes)
    	    $this->cliente_uf = $valueITEM['@ClientState']; //"SP"; // EX para exterior
    		//if (strlen($this->cliente_uf) == 0 or strlen($this->cliente_uf) == 1 or empty($this->cliente_uf))
    		if (strlen($this->cliente_uf) == 2)
    	    	$this->cliente_uf = $this->cliente_uf;
    	    else
    	        throw new Exception('O estado(UF) do cliente precisa ser uma sigla e conter exatos 2 caracteres, corrija essa informa��o no cadastro do cliente no sistema. O arquivo ITEM n&atilde;o pode ser escrito!');


    	    #03 - N - classe de consumo (1 posicao)
    	    $this->cliente_classe_consumo = $this->cliente_classe_consumo;


    	    #04 - N - Fase ou Tipo de Utiliza��o (1 posicao)
    	    $this->cliente_tipo_utilizacao = $this->cliente_tipo_utilizacao;


    	    #05 - N - Grupo de Tens�o  (2 posicoes)
    	    $this->cliente_grupo_tensao = $this->cliente_grupo_tensao;

    	    #06 - N - Data de Emiss�o (8 posicoes)
    	    $this->nf_data_emissao = $data_emissao; //date("Ymd");


    	    #07 - N - Modelo (2 posicoes)
    	    $this->nf_modelo = $this->nf_modelo;


    	    #08 - X - S�rie  (3 posiceos)
    	    $this->nf_serie = $this->nf_serie;


            # IMPORTANTE: O numero da NF do item repete para todos os items do mesmo documento fiscal
            # Ex.: NF 000000001 possui item de numero 001, 002, 003 + LINHA DO "OPTANTE SN - AL�QUOTA.."
            # Apenas incremente o numero da NF quando for um novo documento ou seja quando for gravado o ultimo item do doc. fiscal anterior.
    	    #09 - N - numero da NF (sequencial) (9 posicoes)
            # apenas iterar o numero da nota quando o contrato mudar
            if ($valueITEM['@ContractID'] !== $prev_contract_id && $prev_contract_id !== '')
                $this->nf_numero +=1;

        	$this->nf_numero = sprintf('%09d', $this->nf_numero); # 12 9 posicoes    (usado em ambos arquivos MESTRE e ITEM)  Obs.: a numera��o deve ser reiniciada a cada per�odo de apura��o.



    		## Informa��es referentes aos itens de presta��o de servi�os de comunica��o/telecomunica��o

    	    #10 - N - CFOP  (4 posicoes)
    	    # No loop vai precisar checar o tipo/referencia da fatura para usar o CFOP correto
    	    # Obs.: Algumas faturas terao cobranca de mora, nesse caso aplicamos o CFOP 08XX
    	    # 01 ASSINATURA
    	    #    0104 ASSINATURA DE SERVICO DE PROVIMENTO DE INTERNET
    	    # 02 HABILITACAO
    	    #    0204 HABILITACAO DE SERVICO DE PROVIMENTO DE INTERNET
    	    # 08 COBRANCAS
    	    #    0804 COBRANCA DE JUROS DE MORA
    	    #    0805 COBRANCA DE MULTA DE MORA
    	    $this->cfop_item = $this->cfop_item;



            # se o ID do contrato no loop for diferente do anterior entao zeramos o contador, pois isso indica o primeiro item para o prox. documento fiscal.
            if ($valueITEM['@ContractID'] !== $prev_contract_id && $prev_contract_id !== '')
            {
                # refere-se ao numero de ordem do item
                $count = 0;
            }
            # set o ID do contrato atual como ID do contrato anterior antes de finalizar o loop para o ID atual.
            $prev_contract_id = $valueITEM['@ContractID'];

            #11 - N - No de ordem do Item do documento fiscal (3 posicoes) - Limite de 990 items por documento fiscal, deve ser iniciado em 001.
            $count +=1;
            $this->num_ordem_item = $count;
            $this->num_ordem_item = sprintf('%03d', $this->num_ordem_item); // inicia em 001;



    	    #12 - X - C�digo do item (10 posicoes)
    	    # cod. do plano/servico prestado
    	    $this->cod_item = $valueITEM['@PlanID']; //35;
    	    $this->cod_item = str_pad($this->cod_item, 10, " ", STR_PAD_RIGHT);


    	    #13 - X - Descri��o do item (40 posicoes)
    	    $this->desc_item = substr($valueITEM['@PlanTitle'], 0, 40); //'NOME DO PLANO'; // echo $valueITEM['@PlanTitle'];
    	    $this->desc_item = str_pad($this->desc_item, 40, " ", STR_PAD_RIGHT);


    	    #14 - N - C�digo de classifica��o do item (4 posicoes)
    	    # segue modelo do CFOP #10
    	    # No loop vai precisar checar o tipo/referencia da fatura para usar o CFOP correto
    	    # Obs.: Algumas faturas terao cobranca de mora, nesse caso aplicamos o CFOP 08XX
    	    # 01 ASSINATURA
    	    #    0104 ASSINATURA DE SERVICO DE PROVIMENTO DE INTERNET
    	    # 02 HABILITACAO
    	    #    0204 HABILITACAO DE SERVICO DE PROVIMENTO DE INTERNET
    	    # 08 COBRANCAS
    	    #    0804 COBRANCA DE JUROS DE MORA
    	    #    0805 COBRANCA DE MULTA DE MORA
    	    $this->cod_class_item = $this->cod_class_item;


    	    #15 - X - Unidade (6 posicoes)
    	    $this->unidade = ''; //KBPS
    	    $this->unidade = str_pad($this->unidade, 6, " ", STR_PAD_RIGHT);


    	    #16 - N - Quantidade contratada (com 3 decimais) (12 posicoes)
    	    $this->quantidade_contratada = $this->quantidade_contratada;
    	    //$this->quantidade_contratada = sprintf('%012d', 0);   $valueITEM['@PlanDownload']


    	    #17 - N - Quantidade medida (com 3 decimais)  (12 posicoes)
    	    $this->quantidade_medida = $this->quantidade_medida;
    	    //$this->quantidade_medida = sprintf('%012d', 0);


            #18 - Esse campo foi movido logo abaixo do campo #21


    	    #19 - N - Desconto / Redutores (com 2 decimais) (11 posicoes)
    	    $this->descontos_redutores = $this->descontos_redutores;


    	    #20 - N - Acr�scimos e Despesas Acess�rias (com 2 decimais) (11 posicoes)
    	    $this->acrescimos_despesas_acessorias = $this->acrescimos_despesas_acessorias;



    	    #21 - N - BC ICMS (com 2 decimais) (11 posicoes)
            # Se o ICMS receber valor, entao preencher `$this->bc_icms_item` assim como `$temp_bc_icms_item` com o mesmo valor.
            $this->bc_icms_item = $valueITEM['@InvoiceTotal']; //$valueITEM['@PlanAmount']; //'0.00'; //'1.01';
            $temp_bc_icms_item  = $valueITEM['@InvoiceTotal']; //$valueITEM['@PlanAmount']; //'0.00'; //'1.01';
            $temp_bc_icms_item  = sprintf("%01.2f", $temp_bc_icms_item);
    		$this->bc_icms_item = str_replace('.', '', str_replace(',', '', $this->bc_icms_item));
    	    $this->bc_icms_item = sprintf('%011d', $this->bc_icms_item);
            //echo "<br>" . $temp_bc_icms_item;



    	    #22 - N - ICMS (com 2 decimais) (11 posicoes)
    	    $this->icms_item = '0.00'; //'1.01';
            $this->icms_item  = sprintf("%01.2f", $this->icms_item);
    		$this->icms_item = str_replace('.', '', str_replace(',', '', $this->icms_item));
    	    $this->icms_item = sprintf('%011d', $this->icms_item);
            //echo "<br>" . $this->icms_item;


    	    #23 - N - Opera��es Isentas ou n�o tributadas (com 2 decimais) (11 posicoes)
    	    $this->op_isentas_nao_tributadas = '0.00'; //'1.01';
            $this->op_isentas_nao_tributadas = sprintf("%01.2f", $this->op_isentas_nao_tributadas);
    		$this->op_isentas_nao_tributadas = str_replace('.', '', str_replace(',', '', $this->op_isentas_nao_tributadas));
    	    $this->op_isentas_nao_tributadas = sprintf('%011d', $this->op_isentas_nao_tributadas);
            //echo "<br>" . $this->op_isentas_nao_tributadas;


    	    #24 - N - Outros valores (com 2 decimais) (11 posicoes)
    	    # aqui deve ser informado as multas e juros (valores que nao compoem a base de calculo do icms)
    	    $this->outros_valores = '0.00';
            $this->outros_valores = sprintf("%01.2f", $this->outros_valores);
    		$this->outros_valores = str_replace('.', '', str_replace(',', '', $this->outros_valores));
    	    $this->outros_valores = sprintf('%011d', $this->outros_valores);
            //echo "<br>" . $this->outros_valores;


    	    #25 - N - Al�quota do ICMS (com 2 decimais)  (4 posicoes)
    	    # onde esta esse valor? mantendo ZERO como default.
    	    $this->aliquota_icms = '01.25'; // ate R$120.000 ?
            $this->aliquota_icms = sprintf("%01.2f", $this->aliquota_icms);
    		$this->aliquota_icms = str_replace('.', '', str_replace(',', '', $this->aliquota_icms));
    	    $this->aliquota_icms = sprintf('%04d', $this->aliquota_icms);
            //echo "<br>" . $this->aliquota_icms;




            #18 - N - valor total - o valor total deve incluir o valor do ICMS (com 2 decimais) (11 posicoes)
            # O Total deve ser igual � soma: BC + Isentas + Outros
    		# Informa��es referentes aos valores dos itens de presta��o de servi�os de comunica��o/telecomunica��o.
    	    # para manter 2 decimais.. Ex.: 19|00 ZEROS a direita quando numerico serao truncados, entao transforme o valor
    	    #  numerico numa string.
            # foreach abaixo usado para pegar o valor total de todos os items da NF (se precisar)
            /*
            foreach ($response_mestre as $key => $value) {  //print_r($response_mestre);
                # cid \ total
                if ($value['cid'] == $valueITEM['@ContractID'])
                    $this->valor_total_item = $value['total']; //'2.02';  // + campo #21 BC ICMS
            }
            */
            $temp_valor_total_item  = ($temp_bc_icms_item + $this->op_isentas_nao_tributadas + $this->outros_valores);
            $temp_valor_total_item = sprintf("%01.2f", $temp_valor_total_item);
            //echo "<br>" . $temp_valor_total_item;
            $this->valor_total_item = $temp_valor_total_item; //'2.02';  // + campo #21 BC ICMS
    		$this->valor_total_item = str_replace('.', '', str_replace(',', '', $this->valor_total_item));
    	    $this->valor_total_item = sprintf('%011d', $this->valor_total_item);
            //echo "<br>" . $this->valor_total_item;



            # somat�rio de valor + Acr�scimo - Desconto dos itens
            $fffff = ($this->bc_icms_item + $this->acrescimos_despesas_acessorias - $this->descontos_redutores);



    		# Informa��es de Controle

    	    #26 - X - Situa��o (1 posicao) -> campo 19 do registro Mestre
    	    $this->situacao_documento = $this->situacao_documento;


    	    #27 - X - Ano e M�s de refer�ncia de apura��o  (4 posicoes)
    	    $this->ano_mes_ref_apuracao = $data_apuracao;


    	    #28 - X - N�mero do Contrato (15 posicoes)
    	    $this->numero_contrato = $valueITEM['@ContractID']; //2560;
    	    $this->numero_contrato = str_pad($this->numero_contrato, 15, " ", STR_PAD_RIGHT);
            //echo "<br>" . $this->numero_contrato;


    	    #29 - N - Quantidade faturada (com 3 decimais) (12 posicoes)
    	    # velocidade do plano de internet em Mbps
            //echo "<br>" . $valueITEM['@PlanDownload'];
    	    $this->quantidade_faturada = $valueITEM['@PlanDownload']; //'1.010';
            $quantidade_faturada_mbps  = ($this->quantidade_faturada / 1024);
            $this->quantidade_faturada = sprintf("%01.3f", $quantidade_faturada_mbps);
    		$this->quantidade_faturada = str_replace('.', '', str_replace(',', '', $this->quantidade_faturada));
    	    $this->quantidade_faturada = sprintf('%012d', $this->quantidade_faturada);
            //echo "<br>" . $this->quantidade_faturada;


    	    #30 - N - Tarifa Aplicada / Pre�o M�dio Efetivo (com 6 decimais)  (11 posicoes)
    	    $this->tarifa_aplicada = $this->tarifa_aplicada;


    	    #31 - N - Al�quota PIS/PASEP (com 4 decimais) (6 posicoes)
    	    $this->aliquota_pis_pasep = '00.0000';
            $this->aliquota_pis_pasep = sprintf("%01.4f", $this->aliquota_pis_pasep);
    		$this->aliquota_pis_pasep = str_replace('.', '', str_replace(',', '', $this->aliquota_pis_pasep));
    	    $this->aliquota_pis_pasep = sprintf('%06d', $this->aliquota_pis_pasep);
            //echo "<br>" . $this->aliquota_pis_pasep;


    	    #32 - N - PIS/PASEP (com 2 decimais) (11 posicoes)
    	    $this->pis_pasep = '0.00'; //'1.01';
            $this->pis_pasep = sprintf("%01.2f", $this->pis_pasep);
    		$this->pis_pasep = str_replace('.', '', str_replace(',', '', $this->pis_pasep));
    	    $this->pis_pasep = sprintf('%011d', $this->pis_pasep);
            //echo "<br>" . $this->pis_pasep;


    	    #33 - N - Al�quota COFINS (com 4 decimais)  (6 posicoes)
    	    $this->aliquota_confins = '0.0000'; //'1.0100';
            $this->aliquota_confins = sprintf("%01.4f", $this->aliquota_confins);
    		$this->aliquota_confins = str_replace('.', '', str_replace(',', '', $this->aliquota_confins));
    	    $this->aliquota_confins = sprintf('%06d', $this->aliquota_confins);
            //echo "<br>" . $this->aliquota_confins;


    	    #34 - N - COFINS (com 2 decimais)  (11 posicoes)
    	    $this->confins = '0.00'; //'1.01';
            $this->confins = sprintf("%01.2f", $this->confins);
    		$this->confins = str_replace('.', '', str_replace(',', '', $this->confins));
    	    $this->confins = sprintf('%011d', $this->confins);
            //echo "<br>" . $this->confins;



    	    #35 - X - Indicador de Desconto Judicial (1 posicao)
    	    $this->indicador_desconto_judicial = '';
    	    $this->indicador_desconto_judicial = str_pad($this->indicador_desconto_judicial, 1, " ", STR_PAD_RIGHT);


    	    #36 - N - Tipo de Isen��o/Redu��o de Base de C�lculo  (2 posicoes)
    	    $this->tipo_isencao_reducao_bc = $this->tipo_isencao_reducao_bc;


    	    #37 - X - Brancos - reservado para uso futuro (5 posicoes)
    	    $this->brancos_5 = '';
    	    $this->brancos_5 = str_pad($this->brancos_5, 5, " ", STR_PAD_RIGHT);


    	    #38 - X - C�digo de Autentica��o Digital do registro MD5(campos 01 a 37) (32 posicoes)
    	    $this->item_cod_autenticacao_digital_registro = md5(
    	    	$this->cliente_doc . $this->cliente_uf . $this->cliente_classe_consumo .
    	    	$this->cliente_tipo_utilizacao . $this->cliente_grupo_tensao . $this->nf_data_emissao .
    	    	$this->nf_modelo . $this->nf_serie . $this->nf_numero . $this->cfop_item . $this->num_ordem_item .
    	    	$this->cod_item . $this->desc_item . $this->cod_class_item . $this->unidade . $this->quantidade_contratada .
    	    	$this->quantidade_medida . $this->valor_total_item . $this->descontos_redutores . $this->acrescimos_despesas_acessorias .
    	    	$this->bc_icms_item . $this->icms_item . $this->op_isentas_nao_tributadas . $this->outros_valores .
    	    	$this->aliquota_icms . $this->situacao_documento . $this->ano_mes_ref_apuracao . $this->numero_contrato .
    	    	$this->quantidade_faturada . $this->tarifa_aplicada . $this->aliquota_pis_pasep . $this->pis_pasep .
    	    	$this->aliquota_confins . $this->confins . $this->indicador_desconto_judicial .
    	    	$this->tipo_isencao_reducao_bc . $this->brancos_5
    	    );

    	    ################## ################################################################ ################


        	# filename { UF   CNPJ   Modelo   Serie   Ano   Mes   Status   Tipo   Volume(inicia em 001) }
            // $this->file_001    = $dados_empresa['0']['estado'] . $cnpj . $this->nf_modelo . $this->nf_serie . date("ym") . 'N01I.001';
            $this->file_001    = $dados_empresa['0']['estado'] . $cnpj . $this->nf_modelo . $this->nf_serie . '1701' . 'N01I.001';
        	$this->layout_001 .= $this->cliente_doc . $this->cliente_uf . $this->cliente_classe_consumo . $this->cliente_tipo_utilizacao . $this->cliente_grupo_tensao . $this->nf_data_emissao . $this->nf_modelo . $this->nf_serie . $this->nf_numero . $this->cfop_item . $this->num_ordem_item . $this->cod_item . $this->desc_item . $this->cod_class_item . $this->unidade . $this->quantidade_contratada . $this->quantidade_medida . $this->valor_total_item . $this->descontos_redutores . $this->acrescimos_despesas_acessorias . $this->bc_icms_item . $this->icms_item . $this->op_isentas_nao_tributadas . $this->outros_valores . $this->aliquota_icms . $this->situacao_documento . $this->ano_mes_ref_apuracao . $this->numero_contrato . $this->quantidade_faturada . $this->tarifa_aplicada . $this->aliquota_pis_pasep . $this->pis_pasep . $this->aliquota_confins . $this->confins . $this->indicador_desconto_judicial . $this->tipo_isencao_reducao_bc . $this->brancos_5 . $this->item_cod_autenticacao_digital_registro . "\r" . "\n"; // acrescidos de CR/LF (Carriage Return/Line Feed) ao final de cada registro;


        } // end foreach here




        // precisa gravar essa linha apos o ultimo item do documento fiscal.
        // Obs.: precisa gravar uma ultima vez (1x apenas, fora do loop).
        $this->num_ordem_item +=1;
        $this->num_ordem_item = sprintf('%03d', $this->num_ordem_item); // inicia em 001;
        /******************************************************************************************
        * No caso de empresa optante pelo Simples Nacional, dever� ser criado um registro de item adicional para cada
        * documento fiscal, devendo constar, no campo 13 (Descri��o do servi�o ou fornecimento), a express�o
        * "OPTANTE SN - AL�QUOTA NN, NN", onde "NN, NN" corresponder� � al�quota de ICMS em que o optante estiver
        * enquadrado no per�odo de apura��o, expressa com duas casas decimais. Os campos 10 e 14 devem utilizar os valores
        * utilizados para a opera��o ou presta��o principal. Os campos 16 a 25 dever�o ser preenchidos com zeros
        * (vide item 11.10 Anexo I);
        */
        #13 - X - Descri��o do item (40 posicoes)
        $this->desc_item = "OPTANTE SN - AL�QUOTA " . $this->aliquota_icms; // "OPTANTE SN - AL�QUOTA NN, NN";
        $this->desc_item = str_pad($this->desc_item, 40, " ", STR_PAD_RIGHT);

        #16~25 - N - Os campos 16 a 25 dever�o ser preenchidos com zeros
        $this->campos_16_25 = '';
        $this->campos_16_25 = str_pad($this->campos_16_25, 105, "0", STR_PAD_LEFT);
        //$this->quantidade_contratada . $this->quantidade_medida . $this->valor_total_item . $this->descontos_redutores .
        //$this->acrescimos_despesas_acessorias . $this->bc_icms_item . $this->icms_item . $this->op_isentas_nao_tributadas .
        //$this->outros_valores . $this->aliquota_icms .

        #38 - X - C�digo de Autentica��o Digital do registro MD5(campos 01 a 37) (32 posicoes)
        $this->item_cod_autenticacao_digital_registro = md5(
            $this->cliente_doc . $this->cliente_uf . $this->cliente_classe_consumo .
            $this->cliente_tipo_utilizacao . $this->cliente_grupo_tensao . $this->nf_data_emissao .
            $this->nf_modelo . $this->nf_serie . $this->nf_numero . $this->cfop_item . $this->num_ordem_item .
            $this->cod_item . $this->desc_item . $this->cod_class_item . $this->unidade . $this->campos_16_25 .
            $this->situacao_documento . $this->ano_mes_ref_apuracao . $this->numero_contrato .
            $this->quantidade_faturada . $this->tarifa_aplicada . $this->aliquota_pis_pasep .
            $this->pis_pasep . $this->aliquota_confins . $this->confins . $this->indicador_desconto_judicial .
            $this->tipo_isencao_reducao_bc . $this->brancos_5
        );

        //                   01                   02                  03                              04                               05                            06                       07                 08                09                 10                 11                      12                13                 14                      15               16 ~ 25                26                          27                            28                       29                           30                       31                          32                 33                        34               35                                   36                               37                 38
        $this->layout_001 .= $this->cliente_doc . $this->cliente_uf . $this->cliente_classe_consumo . $this->cliente_tipo_utilizacao . $this->cliente_grupo_tensao . $this->nf_data_emissao . $this->nf_modelo . $this->nf_serie . $this->nf_numero . $this->cfop_item . $this->num_ordem_item . $this->cod_item . $this->desc_item . $this->cod_class_item . $this->unidade . $this->campos_16_25 . $this->situacao_documento . $this->ano_mes_ref_apuracao . $this->numero_contrato . $this->quantidade_faturada . $this->tarifa_aplicada . $this->aliquota_pis_pasep . $this->pis_pasep . $this->aliquota_confins . $this->confins . $this->indicador_desconto_judicial . $this->tipo_isencao_reducao_bc . $this->brancos_5 . $this->item_cod_autenticacao_digital_registro . "\r" . "\n"; // acrescidos de CR/LF (Carriage Return/Line Feed) ao final de cada registro;
        /******************************************************************************************/




    	# layout display (remove it later)
    	print "<pre>"; print $this->layout_001; print "</pre>";

		# GRAVA ARQUIVO MESTRE 001
	    if (!file_put_contents('001/'.$this->file_001, $this->layout_001, LOCK_EX))
	        throw new Exception('O arquivo <b>'.$this->file_001.'</b> n&atilde;o pode ser escrito!');
	    else
	    	return '<pre>O arquivo <b>`'.$this->file_001.'`</b> foi escrito com sucesso!</pre>';

    }



    /*******************************************************************************************************************
    * CADASTRO DE DOCUMENTO FISCAL
    * Usamos o mesmo array com os dados do arquivo MESTRE.
    *******************************************************************************************************************/
    //public function Cadastro($nf_numero, $nf_ref_item, $data_apuracao, $data_emissao, $dados_empresa, $database)
    public function Cadastro($arrayMESTRE, $nf_numero, $nf_ref_item, $data_apuracao, $data_emissao, $dados_empresa, $database)
    {
    	$this->layout_001   = '';
    	$nf_referencia_item = sprintf('%09d', $nf_ref_item);  # 21   melhor usar sprintf() ao invez de str_pad(111, 9, "0", STR_PAD_LEFT);


    	# tratar cnpj da empresa
		$cnpj = str_replace('.', '', str_replace('/', '', str_replace('-', '', $dados_empresa['0']['cnpj'])));
		if (strlen($cnpj) != 14)
	        throw new Exception('O CNPJ da empresa precisa conter exatos 14 caracteres, corrija essa informa��o no cadastro de empresa do sistema. O arquivo CADASTRO n&atilde;o pode ser escrito!');


        // inicia a sequencia da nota
        $this->nf_numero = $nf_numero;

	    ################## daqui para baixo precisa validar tudo dentro do LOOP da consulta ################
        foreach($arrayMESTRE as $valueMESTRE)
        {
            # consutla a tabela de municipios do IBGE - aqui precisamos do nome da cidae e do codigo da cidade.
            $dados_tb_municipios_ibge = $database->select("tb_municipios_ibge", "*", array("tb_cidades_id[=]" => $valueMESTRE['@ClientCity']));


            #01 - N - tratar documento(cpf/cnpj) cliente
            if (!empty($valueMESTRE['@ClientCPF']))
                $this->cliente_doc = $valueMESTRE['@ClientCPF'];
            else
                $this->cliente_doc = $valueMESTRE['@ClientCNPJ'];

    	    //$this->cliente_doc = "00.000.000/0001-00";
    		$this->cliente_doc = str_replace('.', '', str_replace('/', '', str_replace('-', '', $this->cliente_doc)));
    		//if (strlen($this->cliente_doc) < 11 or strlen($this->cliente_doc) > 14)
    		// tratamento: Em se tratando de pessoa n�o obrigada � inscri��o no CNPJ ou CPF, preencher o campo com zeros.
    		if (strlen($this->cliente_doc) < 1 or strlen($this->cliente_doc) == 11 or strlen($this->cliente_doc) == 14)
    	    {
                if (strlen($this->cliente_doc) < 1)
    	    	{
    	    		$this->cliente_doc = '00000000000000';
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 3;  // se nao possuir CPF ou CNPJ entao sera tratado como residencial/pessoa fisica
    	    	}
    	    	elseif (strlen($this->cliente_doc) == 11)
    	    	{
                    //$this->cliente_doc = '000' . $this->cliente_doc; // primeira tentativa nao funcionou
                    //$this->cliente_doc = sprintf('%014d', $this->cliente_doc);
                    $this->cliente_doc = $this->cliente_doc . '000';
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 3;  // residencial/pessoa fisica
    	    	}
                elseif (strlen($this->cliente_doc) == 14)
    	    	{
                    $this->cliente_doc = sprintf('%014d', $this->cliente_doc);
    	    		//$this->cliente_doc = $this->cliente_doc;
    	    		$flag_cliente_doc = 1;
    	    		$flag_tipo_cliente = 1;  // comercial
    	    	}
    	    	else
                    throw new Exception('O documento do cliente (CPF/CNPJ) precisa conter exatos 14 caracteres para CNPJ ou 11 caracteres para CPF, corrija essa informa��o no cadastro do cliente no sistema. O arquivo CADASTRO n&atilde;o pode ser escrito!');

                // vamos converter para um numero inteiro explicitamente fazendo um cast
                $this->cliente_doc = sprintf('%014d', (int)$this->cliente_doc);
    	    }
    	    else
    	        throw new Exception('O documento do cliente precisa conter exatos 14 caracteres para CNPJ ou 11 caracteres para CPF ou VAZIO para pessoa nao obrigada a inscricao no CPF ou CNPJ, corrija essa informa��o no cadastro do cliente no sistema. O arquivo CADASTRO n&atilde;o pode ser escrito!');

    	    #02 - X - tratar IE cliente - ausencia da informacao preencher com ISENTO seguido de posicoes em branco
    	    //$this->cliente_ie = "231.135.384";
    	    $this->cliente_ie = "00009043528537";
    	    $this->cliente_ie = $valueMESTRE['@ClientIE']; //"00000000000000";

    		$this->cliente_ie = str_replace('.', '', str_replace('/', '', str_replace('-', '', $this->cliente_ie)));
    		if ($this->cliente_ie['0'] == 0)
    		{
    			if ($this->cliente_ie == '00000000000000')
    				$temp_cliente_ie = str_pad("ISENTO", 14, " ", STR_PAD_RIGHT);  //$temp_cliente_ie = "ISENTO        ";
    			else
    			{
    				$temp_cliente_ie = substr($this->cliente_ie, 1); // remove o primeiro caracter se for ZERO
    				for ($a=0;$a<5;$a++)
    				{
    					if ($temp_cliente_ie[$a] == 0)
    						$temp_cliente_ie = substr($temp_cliente_ie, 1); // remove o primeiro caracter se for ZERO
    				}
    			}
    			$this->cliente_ie = $temp_cliente_ie;
    		}
    		else
    			$this->cliente_ie = $this->cliente_ie;

    		$this->cliente_ie = str_pad($this->cliente_ie, 14, " ", STR_PAD_RIGHT);


    	    #03 - X - razao social
    		$this->cliente_razao_social = $valueMESTRE['@ClientName']; //"Jo�o F�lix A�or�s";
    		// se o arquivo foi salvo com o encoding UTF-8 usar a funcao utf8_decode() para decodificar, caso contrario nao havera necessidade do uso da funcao.
    		//$this->cliente_razao_social = strtr($this->cliente_razao_social, utf8_decode('���������������������������������������������������'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    		$this->cliente_razao_social = strtr($this->cliente_razao_social, '���������������������������������������������������', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            if (strlen($this->cliente_razao_social) >= 35)
            	$this->cliente_razao_social = mb_strimwidth($this->cliente_razao_social, 0, 35);
            elseif (strlen($this->cliente_razao_social) < 35)
            	$this->cliente_razao_social = str_pad($this->cliente_razao_social, 35);
            else
            	$this->cliente_razao_social = $this->cliente_razao_social;

            $this->cliente_razao_social = mb_strtoupper($this->cliente_razao_social);


            #04 - X - Logradouro (45 posicoes)
            $this->cliente_end_logradouro = $valueMESTRE['@ClientAddress']; //"Rua Jo�o F�lix A�or�s";
    		// se o arquivo foi salvo com o encoding UTF-8 usar a funcao utf8_decode() para decodificar, caso contrario nao havera necessidade do uso da funcao.
    		//$this->cliente_end_logradouro = strtr($this->cliente_razao_social, utf8_decode('���������������������������������������������������'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    		$this->cliente_end_logradouro = strtr($this->cliente_end_logradouro, '���������������������������������������������������', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            if (strlen($this->cliente_end_logradouro) >= 45)
            	$this->cliente_end_logradouro = mb_strimwidth($this->cliente_end_logradouro, 0, 45);
            elseif (strlen($this->cliente_end_logradouro) < 45)
            	$this->cliente_end_logradouro = str_pad($this->cliente_end_logradouro, 45);
            else
            	$this->cliente_end_logradouro = $this->cliente_end_logradouro;

            $this->cliente_end_logradouro = mb_strtoupper($this->cliente_end_logradouro);


            #05 - N - Numero (5 posicoes)
            $this->cliente_end_numero = $valueMESTRE['@ClientAddressNumber']; //'8059';
    		$this->cliente_end_numero = str_replace('.', '', str_replace('-', '', $this->cliente_end_numero));
    	    $this->cliente_end_numero = sprintf('%05d', $this->cliente_end_numero);
            if (strlen($this->cliente_end_numero) > 5)
                throw new Exception('O numero do endere�o do cliente precisa conter no m�ximo 5 posi��es. O arquivo CADASTRO n�o pode ser escrito!');


            #06 - X - complemento (15 posicoes)
            $this->cliente_end_complemento = trim($valueMESTRE['@ClientAddressComp']); //"Sal�o F�lix A�ur�s";
    		// se o arquivo foi salvo com o encoding UTF-8 usar a funcao utf8_decode() para decodificar, caso contrario nao havera necessidade do uso da funcao.
    		//$this->cliente_end_complemento = strtr($this->cliente_end_complemento, utf8_decode('���������������������������������������������������'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    		$this->cliente_end_complemento = strtr($this->cliente_end_complemento, '���������������������������������������������������', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            if (strlen($this->cliente_end_complemento) >= 15)
            	$this->cliente_end_complemento = mb_strimwidth($this->cliente_end_complemento, 0, 15);
            elseif (strlen($this->cliente_end_complemento) < 15)
            	$this->cliente_end_complemento = str_pad($this->cliente_end_complemento, 15);
            else
            	$this->cliente_end_complemento = $this->cliente_end_complemento;

            $this->cliente_end_complemento = mb_strtoupper($this->cliente_end_complemento);


            #07 - N - CEP (8 posicoes)
            $this->cliente_end_cep = $valueMESTRE['@ClientAddressZipcode']; //'18460-000';
    		$this->cliente_end_cep = str_replace('.', '', str_replace('-', '', $this->cliente_end_cep));
    	    $this->cliente_end_cep = sprintf('%08d', $this->cliente_end_cep);
            if (strlen($this->cliente_end_cep) > 8)
                throw new Exception('O CEP do cliente precisa conter no m�ximo 8 posi��es num�ricas. O arquivo CADASTRO n�o pode ser escrito!');


            #08 - X - Bairro (15 posicoes)
            $this->cliente_end_bairro = $valueMESTRE['@ClientAddressSuburb']; //"F�lix A�or�s";
    		// se o arquivo foi salvo com o encoding UTF-8 usar a funcao utf8_decode() para decodificar, caso contrario nao havera necessidade do uso da funcao.
    		//$this->cliente_end_bairro = strtr($this->cliente_end_bairro, utf8_decode('���������������������������������������������������'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    		$this->cliente_end_bairro = strtr($this->cliente_end_bairro, '���������������������������������������������������', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            if (strlen($this->cliente_end_bairro) >= 15)
            	$this->cliente_end_bairro = mb_strimwidth($this->cliente_end_bairro, 0, 15);
            elseif (strlen($this->cliente_end_bairro) < 15)
            	$this->cliente_end_bairro = str_pad($this->cliente_end_bairro, 15);
            else
            	$this->cliente_end_bairro = $this->cliente_end_bairro;

            $this->cliente_end_bairro = mb_strtoupper($this->cliente_end_bairro);



            #09 - X - municipio (30 posicoes)
            # Essa consulta precisa ser feita pelo ID da cidade na tabela `tb_cidades` do sistema.
            # Tenha certeza que o charset esta configurado como: Latin1, caso contrario a quebra no charset vai retornar caracteres que nao se encontram na lista abaixo e isso causa erro na validacao do arquivo.
            $this->cliente_end_nome_municipio_ibge = $dados_tb_municipios_ibge['0']['nom_mun'];
    		// se o arquivo foi salvo com o encoding UTF-8 usar a funcao utf8_decode() para decodificar, caso contrario nao havera necessidade do uso da funcao.
    		//$this->cliente_end_nome_municipio_ibge = strtr($this->cliente_end_nome_municipio_ibge, utf8_decode('���������������������������������������������������'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    		///////>>>>> $this->cliente_end_nome_municipio_ibge = strtr($this->cliente_end_nome_municipio_ibge, '���������������������������������������������������', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            if (strlen($this->cliente_end_nome_municipio_ibge) >= 30)
            	$this->cliente_end_nome_municipio_ibge = mb_strimwidth($this->cliente_end_nome_municipio_ibge, 0, 30);
            elseif (strlen($this->cliente_end_nome_municipio_ibge) < 30)
            	$this->cliente_end_nome_municipio_ibge = str_pad($this->cliente_end_nome_municipio_ibge, 30);
            else
            	$this->cliente_end_nome_municipio_ibge = $this->cliente_end_nome_municipio_ibge;

            // Nao transformar em maiusculas, pois o valor precisa ser exatamente igual a tabela IBGE ou nao sera validado (testado inumeras vezes)
            ///////>>>>> $this->cliente_end_nome_municipio_ibge = mb_strtoupper($this->cliente_end_nome_municipio_ibge);



            #10 - X - UF (2 posicoes)
    	    $this->cliente_uf = $valueMESTRE['@ClientState']; //"SP"; // EX para exterior
    		if (strlen($this->cliente_uf) == 2)
    	    	$this->cliente_uf = $this->cliente_uf;
    	    else
    	        throw new Exception('O estado(UF) do cliente precisa ser uma sigla e conter exatos 2 caracteres, corrija essa informa��o no cadastro do cliente no sistema. O arquivo CADASTRO n&atilde;o pode ser escrito!');


            #11 - X - telefone (12 posicoes)
            //"(15) 98787-3434";  // funciona com qualquer combinacao usando os seguintes caracteres sem as aspas: "() .-"
            $this->cliente_tel_contato = str_replace(' ', '', str_replace('(', '', str_replace(')', '', str_replace('.', '', str_replace('-', '', $valueMESTRE['@ClientPhone1'])))));
            if (strlen($this->cliente_tel_contato) > 12)
                throw new Exception('O telefone do cliente precisa conter no m�ximo 12 posi��es. O arquivo CADASTRO n�o pode ser escrito!');
            else
                $this->cliente_tel_contato = str_pad($this->cliente_tel_contato, 12, " ", STR_PAD_RIGHT);


            #12 - X - C�digo de identifica��o do consumidor ou assinante (12 posicoes)
    	    $this->cliente_cod_assinante = str_pad($valueMESTRE['@ClientID'], 12, " ", STR_PAD_RIGHT);


            #13 - X - numero terminal ou unidade consumidora (12 posicoes)
    	    ######### $this->num_terminal_tel_unid_consumidora = str_pad($this->num_terminal_tel_unid_consumidora, 12, " ", STR_PAD_RIGHT);  // estava usando essa linha anteriormente.
            //"(15) 98787-3434";  // funciona com qualquer combinacao usando os seguintes caracteres sem as aspas: "() .-"
            $this->num_terminal_tel_unid_consumidora = str_replace(' ', '', str_replace('(', '', str_replace(')', '', str_replace('.', '', str_replace('-', '', $valueMESTRE['@ClientPhone1'])))));
            if (strlen($this->num_terminal_tel_unid_consumidora) > 12)
                throw new Exception('O numero do terminal telefonico da unidade consumidora do cliente precisa conter no m�ximo 12 posi��es. O arquivo CADASTRO n�o pode ser escrito!');
            else
                $this->num_terminal_tel_unid_consumidora = str_pad($this->num_terminal_tel_unid_consumidora, 12, " ", STR_PAD_RIGHT);





            #14 - X - UF de habilita��o do terminal telef�nico (2 posicoes)
    	    $this->uf_terminal_tel_unid_consumidora = "";
        	$this->uf_terminal_tel_unid_consumidora = str_pad($this->uf_terminal_tel_unid_consumidora, 2, " ", STR_PAD_RIGHT);


            #15 - N - Data de emiss�o (8 posicoes)
            $this->nf_data_emissao = $data_emissao; //20170120; //date("Ymd");


            #16 - N - Modelo (2 posicoes)
            $this->nf_modelo = $this->nf_modelo;


            #17 - X - S�rie (3 posicoes)
            $this->nf_serie = $this->nf_serie;


            #18 - N - N�mero (9 posicoes)
            # IMPORTANTE: O numero da NF do item repete para todos os items do mesmo documento fiscal
            # Ex.: NF 000000001 possui item de numero 001, 002, 003 + LINHA DO "OPTANTE SN - AL�QUOTA.."
            # Apenas incremente o numero da NF quando for um novo documento fiscal ou seja quando for gravado o ultimo item do doc. fiscal anterior.
    	    $this->nf_numero +=1;
        	$this->nf_numero = sprintf('%09d', $this->nf_numero); # 12 9 posicoes    (usado em ambos arquivos MESTRE e ITEM)  Obs.: a numera��o deve ser reiniciada a cada per�odo de apura��o.


            #19 - N - C�digo do Munic�pio (7 posicoes)
            $this->codigo_municipio_ibge = $dados_tb_municipios_ibge['0']['cod_mun'];
            $this->codigo_municipio_ibge = sprintf('%07d', $this->codigo_municipio_ibge);


            #20 - X - Brancos - reservado para uso futuro (5 posicoes)
            $this->brancos_5 = $this->brancos_5;


            #21 - X - C�digo de Autentica��o Digital do registro (32 posicoes)
            $this->cod_autenticacao_digital_registro = md5(
                $this->cliente_doc . $this->cliente_ie . $this->cliente_razao_social . $this->cliente_end_logradouro .
                $this->cliente_end_numero . $this->cliente_end_complemento . $this->cliente_end_cep .
                $this->cliente_end_bairro . $this->cliente_end_nome_municipio_ibge . $this->cliente_uf .
                $this->cliente_tel_contato . $this->cliente_cod_assinante . $this->num_terminal_tel_unid_consumidora .
                $this->uf_terminal_tel_unid_consumidora . $this->nf_data_emissao . $this->nf_modelo . $this->nf_serie . $this->nf_numero .
                $this->codigo_municipio_ibge . $this->brancos_5
            );

            ################## ################################################################ ################

        	# filename { UF   CNPJ   Modelo   Serie   Ano   Mes   Status   Tipo   Volume(inicia em 001) }
            // $this->file_001    = $dados_empresa['0']['estado'] . $cnpj . $this->nf_modelo . $this->nf_serie . date("ym") . 'N01D.001';
            $this->file_001    = $dados_empresa['0']['estado'] . $cnpj . $this->nf_modelo . $this->nf_serie . $data_apuracao . 'N01D.001';
        	$this->layout_001 .= $this->cliente_doc . $this->cliente_ie . $this->cliente_razao_social . $this->cliente_end_logradouro . $this->cliente_end_numero . $this->cliente_end_complemento . $this->cliente_end_cep . $this->cliente_end_bairro . $this->cliente_end_nome_municipio_ibge . $this->cliente_uf . $this->cliente_tel_contato . $this->cliente_cod_assinante . $this->num_terminal_tel_unid_consumidora . $this->uf_terminal_tel_unid_consumidora . $this->nf_data_emissao . $this->nf_modelo . $this->nf_serie . $this->nf_numero . $this->codigo_municipio_ibge . $this->brancos_5 . $this->cod_autenticacao_digital_registro . "\r\n"; // acrescidos de CR/LF (Carriage Return/Line Feed) ao final de cada registro;


        } // end foreach


    	# layout display (remove it later)
    	print "<pre>"; print $this->layout_001; print "</pre>";

		# GRAVA ARQUIVO CADASTRO 001
	    if (!file_put_contents('001/'.$this->file_001, $this->layout_001, LOCK_EX))
	        throw new Exception('O arquivo <b>'.$this->file_001.'</b> n&atilde;o pode ser escrito!');
	    else
	    	return '<pre>O arquivo <b>`'.$this->file_001.'`</b> foi escrito com sucesso!</pre>';

    }


    // display property
    public function getProperty()
    {
        return $this->ano_mes_ref_apuracao;
    }


} // end class
?>
