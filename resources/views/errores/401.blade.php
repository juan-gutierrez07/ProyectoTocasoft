
<div>
    <h1>401</h1>
    <h2>Acceso Denegado</h2>
  
    <p>Perdón {{ auth()->user()->name }}, No tienes acceso a este recurso</p>
  
   
</div>


<style>
body {
    background: url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/creampaper.png);
      text-align: center;
      color: #405060;
  }
  
  div {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 40%;
    padding: 20px;  
    text-align: center;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
      text-shadow: 0 2px 1px hsla(0,0%,100%,.2);
  }
  
  h1 {
      font-size: 2.5em;
      margin-bottom: 0.2em;
  }
  
  p {
        padding-bottom: 3px;
  }
  
  a {
      text-decoration: none;
      border-bottom: 1px solid currentColor;
  }
  
  a:hover {
    color: indigo;
  }
  </style>

  