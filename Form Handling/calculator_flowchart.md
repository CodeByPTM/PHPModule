# Calculator App Flowchart

Below is a flowchart describing the logic of the PHP calculator app:

```mermaid
flowchart TD
    A([Start])
    B{Form Submitted?}
    C[Display Calculator Form]
    D[Get num1, num2, operator from POST]
    E{Operator}
    F[Addition: result = num1 + num2]
    G[Subtraction: result = num1 - num2]
    H[Multiplication: result = num1 * num2]
    I{num2 != 0?}
    J[Division: result = num1 / num2]
    K[Error: Division by zero]
    L[Invalid operator]
    M[Display Result]
    N([End])

    A --> B
    B -- No --> C --> N
    B -- Yes --> D --> E
    E -- "+" --> F --> M
    E -- "-" --> G --> M
    E -- "*" --> H --> M
    E -- "/" --> I
    I -- Yes --> J --> M
    I -- No --> K --> M
    E -- else --> L --> M
    M --> N
```

- The flowchart uses Mermaid syntax, which can be rendered in many Markdown viewers and tools.
- It covers the main logic: form submission, input retrieval, operator selection, calculation, error handling, and result display.
