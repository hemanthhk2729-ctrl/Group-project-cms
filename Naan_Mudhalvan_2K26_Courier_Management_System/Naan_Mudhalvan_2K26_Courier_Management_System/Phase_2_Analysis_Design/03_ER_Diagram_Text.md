# ER Diagram – Text Representation

USERS
  |
  | 1 ---- N
  |
COURIERS
  |
  | 1 ---- N
  |
STATUS_HISTORY

Relationships:
- One user can create/manage many courier records.
- One courier can have many status-history records.
- A courier can optionally be assigned to a delivery staff user.
