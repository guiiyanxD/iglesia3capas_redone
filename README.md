# **Configuración Docker para Entorno de Desarrollo Web**

## **📋 Requisitos Previos**
- Docker instalado ([Instalación para Ubuntu](https://docs.docker.com/engine/install/ubuntu/))
- Docker Compose instalado
- Acceso a terminal (Linux/Mac/WSL2 en Windows)

---


---

## **🚀 Configuración Paso a Paso**

### **1. Crear estructura de directorios** comandos  a seguir
```bash 
sudo docker exec -it db-server mariadb -u root -p
```
```bash
CREATE USER 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'user'@'%';
FLUSH PRIVILEGES;
```
### Se debe aplicar el patron Strategy para controlar las conexiones desde windows o linux