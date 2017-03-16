<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div class="row">
	        <div class="col-md-12">
	          <h2 class="page-header">
	            <img src="{{asset('/img/logo.png')}}" width="150" alt="" >
	            <small style="float:right;"><strong style="text-align: center;">Avaliação da Apetidão Física</strong></small>
	          </h2>
            </div><!-- /.col -->
        </div>
      <hr>
      <!-- info row -->
      <div class="row invoice-info">
        <table>
        <tr>
          <td>
            <div class="">
              <p style="text-align:justify">
                <b>Nome: </b>{{$clients[0]->name}}<br>
                <b>Data de nascimento: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $clients[0]->dt_nasc)->format('d-m-Y') }}<br>
              </p>
            </div><!-- /.col -->
          </td>
          <td>
            <div class="">
              <p style="text-align:justify">
                <b>Sexo:</b> {{$clients[0]->sexo == 1 ? 'Masculino':'Feminino'}} <br>
                <b>Telemovel:</b> {{$clients[0]->telemovel}} <br>
              </p>
            </div><!-- /.col -->
          </td>
          <td>
            <div class="">
              <p style="text-align:justify">
                <b>Email: </b>{{$clients[0]->email}}<br>
                <b>Data de avaliação: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $clients[0]->dt_test)->format('d-m-Y')}}<br>
              </p>
            </div><!-- /.col -->
          </td>
        </tr>
      </table>
      </div><!-- /.row -->
    </header>
    <br>
    <main>
      <table>
        <thead>
          <tr>
            <th class="col-md-6">Item avaliado</th>
            <th class="col-md-2" style="text-align:center;">Seus dados</th>
            <th class="col-md-2" style="text-align:center;">Mínimo</th>
            <th class="col-md-2" style="text-align:center;">Máximo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>

        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
