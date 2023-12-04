<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Tableau d'informations</title>
  <link rel="stylesheet" href="../Statiques/style.css">
</head>
<body>
  <div class="bareTitre">
    <a href="http://localhost/TP2">
      <div class="titre">
        <img src="../Statiques/3345583.png" alt="logo" srcset="" width="48px" height="48px">
        <h1 class="titre">
          Carnet d'adresses
        </h1>
      </div>
    </a>
  </div>
  <main>
    <div class="baralaterale">
      <a href="http://localhost/TP2/Vues/enregisterContacts.php">
        <div class="nouveaux">
          <i class="nouveau">
            <svg width="24" height="24" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
              <path d="M18 13H13V18C13 18.2652 12.8946 18.5196 12.7071 18.7071C12.5196 18.8946 12.2652 19 12 19C11.7348 19 11.4804 18.8946 11.2929 18.7071C11.1054 18.5196 11 18.2652 11 18V13H6C5.73478 13 5.48043 12.8946 5.29289 12.7071C5.10536 12.5196 5 12.2652 5 12C5 11.7348 5.10536 11.4804 5.29289 11.2929C5.48043 11.1054 5.73478 11 6 11H11V6C11 5.73478 11.1054 5.48043 11.2929 5.29289C11.4804 5.10536 11.7348 5 12 5C12.2652 5 12.5196 5.10536 12.7071 5.29289C12.8946 5.48043 13 5.73478 13 6V11H18C18.2652 11 18.5196 11.1054 18.7071 11.2929C18.8946 11.4804 19 11.7348 19 12C19 12.2652 18.8946 12.5196 18.7071 12.7071C18.5196 12.8946 18.2652 13 18 13Z" fill="white" stroke="white" stroke-width="0.5"/>
            </svg>            
          </i>
          <p class="item">
            nouveau contact
          </p>
        </div>
      </a>
        <div class="contact">
          <i class="contact">
            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.0599 10.0905C12.8463 10.0905 15.1051 7.83164 15.1051 5.04523C15.1051 2.25883 12.8463 0 10.0599 0C7.27348 0 5.01465 2.25883 5.01465 5.04523C5.01465 7.83164 7.27348 10.0905 10.0599 10.0905Z" fill="black"/>
              <path d="M13.293 19.314H18.7599V20.4074H13.293V19.314Z" fill="black"/>
              <path d="M8.60671 20.876V23.219C8.60671 23.4262 8.68899 23.6248 8.83546 23.7713C8.98192 23.9177 9.18057 24 9.3877 24H22.6646C22.8718 24 23.0704 23.9177 23.2169 23.7713C23.3633 23.6248 23.4456 23.4262 23.4456 23.219V15.4091C23.4456 15.2019 23.3633 15.0033 23.2169 14.8568C23.0704 14.7104 22.8718 14.6281 22.6646 14.6281H17.1977V13.48C17.1977 13.2729 17.1154 13.0742 16.9689 12.9278C16.8225 12.7813 16.6238 12.699 16.4167 12.699C16.2095 12.699 16.0109 12.7813 15.8644 12.9278C15.718 13.0742 15.6357 13.2729 15.6357 13.48V14.6281H14.0737V11.8321C12.7465 11.6154 11.4041 11.5057 10.0594 11.5041C7.09376 11.4915 4.1614 12.1286 1.46841 13.3707C1.02518 13.5798 0.651257 13.9118 0.391005 14.3271C0.130754 14.7423 -0.00490145 15.2236 0.00013533 15.7137V20.876H8.60671ZM21.8836 22.438H10.1687V16.1901H15.6357V16.5181C15.6357 16.7252 15.718 16.9239 15.8644 17.0703C16.0109 17.2168 16.2095 17.2991 16.4167 17.2991C16.6238 17.2991 16.8225 17.2168 16.9689 17.0703C17.1154 16.9239 17.1977 16.7252 17.1977 16.5181V16.1901H21.8836V22.438Z" fill="black"/>
              </svg>
          </i>
          <p class="item">
            tous les contacts
          </p>
        </div>
    </div>
    </div>
    <div class="contenu">
      <table>
        <thead>
          <tr>
            <th>N°</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Numéro de téléphone</th>
            <th>Adresse mail</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require_once("../Controlleurs/Contact.php");
            foreach ($lesContacts as $key => $value) {
    
          ?>
            <tr>
              <td><?= $key ?></td>
              <td><img src="lien_de_la_photo.jpg" alt="Photo de profil"></td>
              <td><?= $value->getNom() ?></td>
              <td><?= $value->getAdresse() ?></td>
              <td><?= $value->getTelephone() ?></td>
              <td><?= $value->getEmail() ?></td>
            </tr> 
          <?php
    
          }
          ?>
    
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
