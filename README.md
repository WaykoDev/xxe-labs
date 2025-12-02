# XXE Labs

XXE Labs is a Dockerized lab environment designed to practice **XML External Entity (XXE)** vulnerability exploitation.

The lab offers 3 difficulty levels:
1.  **Reflected:** The server returns the parsed content in the response.
2.  **Blind:** No visual response; requires Out-Of-Band (OOB) exfiltration.
3.  **Error-Based:** Exfiltration via verbose error messages.

## Quick Start

Prerequisites: **Docker** and **Git**.

Run the following command to clone the repo and start the lab:

```bash
git clone https://github.com/WaykoDev/xxe-labs.git && cd xxe-labs && docker-compose up --build -d 
```

Enjoy! 👨🏽‍💻