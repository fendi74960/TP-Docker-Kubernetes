LOMBARDI Alexis
CARRILLO Killian

# TP Info910

Cette appliquation fonctionne  sous deux technologies: Docker et Kubernetes.

## Démarage de l'appliquation sous kubernetes

Pour lancer kubernetes:
  Dans le dossier, faire :
    minikube start
    kubectl apply -f k8s/
    minikube service userlist

## Démarage de l'appliquation avec docker-compose

Pour lancer docker :
  Dans le dossier, faire :
    docker compose up

### Commandes et astuces utilisé:

Pour générer un configmap, nous avons dans un premier temps créer un fichier init.mysql.
Puis, nous avons executer la commande suivante:
```
kubectl.exe create configmap init-db --from-file=init-db.sql=init.mysql --dry-run=client -o yaml > .\k8s\configmap.yaml
```

Pour appliquer à nouveau la création des pods/services/configmap, on utilise les commandes:
```
kubectl.exe delete -f .\k8s\
kubectl.exe apply -f .\k8s\
```

Pour démarer notre projet, on utilise les commandes:
```
minikube start
minikube service userlist
```

On peut vérifier que tout fonctionne bien avec la commande:
```
kubectl get all
```

Pour créer une image docker sur docker hub, nous avons utilisé les commandes:
```
docker build -t fendi74960/tp-info910:X.X.XX php
docker push fendi74960/tp-info910:X.X.XX
```

On ne peut pas modifier la même image docker deux fois, donc on doit préciser un numéro de version. Celui-ci doit aussi être modifier dans le fichier `./k8s/userlist-dep.yaml`.