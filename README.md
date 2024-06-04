# High-Level Network-On-Chip Simulator

## Overview

This repository contains the code and documentation for a High-Level Network-On-Chip (NoC) Simulator designed for modeling networks with arbitrary topologies. The simulator addresses the limitations of existing NoC simulators by providing flexibility in topology selection, routing algorithms, and various network parameters, thus ensuring accurate and efficient high-level NoC modeling.

## Features

- **Support for Arbitrary Topologies**: Unlike many existing tools, our simulator allows for the simulation of arbitrary user-defined topologies, enhancing flexibility and adaptability to diverse network configurations.
- **Customizable Parameters**: Configure essential parameters such as network topology, routing algorithms, buffer sizes, virtual channels, data packet sizes, packet generation frequencies, and traffic patterns.
- **High-Level Modeling**: Focuses on high-level modeling to aid in the selection of optimal network configurations, which is crucial for efficient NoC design.

## Background

Network-on-chip (NoC) is a critical component for integrating multiple heterogeneous cores into a single system on a chip (SoC). Given the importance of reliable, scalable, and energy-efficient communication within such systems, the development of robust NoC models is essential. This simulator aims to fulfill that need by providing a versatile platform for high-level modeling of NoCs with arbitrary topologies.

## Comparative Analysis

### Existing Models and Their Capabilities

1. **UOCNS Model**
   - Evolution from gpNoCsim and gpNoCsim++
   - Supports arbitrary user-defined topologies
   - New routing algorithms
   - Customizable topology parameters

2. **Newxim Model**
   - Enhanced from the Noxim model
   - Diverse set of critical parameters for precise simulations
   - Focus on advanced NoC design and performance analysis

3. **BookSim Model**
   - Supports a wide range of topologies
   - Open-source, allowing for extensions
   - Comprehensive customization of network parameters

4. **Dec9 Model**
   - Implemented in Java, ensuring cross-platform compatibility
   - XML file specifications for network topologies
   - Flexible structure for adding new routing algorithms

5. **PyOCN Model**
   - Based on the open-source PyMTL framework
   - Written in Python
   - Supports XBar, butterfly, mesh, torus, ring topologies, and custom topologies

### Comparison Table

| Model   | Supported Topologies      | Custom Topologies | Key Features                                      |
|---------|---------------------------|-------------------|---------------------------------------------------|
| UOCNS   | Mesh, torus, circulant    | Yes               | Enhanced flexibility and new routing algorithms   |
| Newxim  | Various                   | Yes               | Detailed simulation parameters                    |
| BookSim | Mesh, torus, circulant    | Yes (via extension)| Extensive customization options                   |
| Dec9    | Various                   | Yes (via XML)     | Cross-platform, high-level modeling               |
| PyOCN   | XBar, butterfly, mesh, torus, ring | Yes         | Built on PyMTL, Python-based                      |

## Methods

In this section, only models supporting arbitrary topologies will be further explored for detailed examination. The UOCNS model, specifically, stands out due to its vast array of configurable parameters, allowing for detailed and tailored NoC simulations.

## Getting Started

### Prerequisites

- Python 3.x
- Required libraries (see `requirements.txt`)

### Installation

Clone the repository and install the necessary dependencies:

```bash
git clone https://github.com/your-username/noc-simulator.git
cd noc-simulator
pip install -r requirements.txt
```

### Usage

Below are the basic steps to set up and run the simulator:

1. **Define Topology**: Specify your network topology in the provided configuration file or directly through the API.
2. **Configure Parameters**: Set your desired parameters for routing algorithms, buffer sizes, virtual channels, etc.
3. **Run Simulation**: Execute the simulation script and analyze the output.

Example:

```python
from simulator import NoCSimulator

# Define your network topology
topology = "mesh"
parameters = {
    "rows": 4,
    "cols": 4,
    "routing_algorithm": "xy",
    "buffer_size": 8,
    "virtual_channels": 2,
    "packet_size": 128,
    "traffic_pattern": "uniform"
}

# Initialize simulator
noc_sim = NoCSimulator(topology, parameters)

# Run simulation
results = noc_sim.run()
print(results)
```

## Documentation

For detailed documentation on using the simulator, configuring parameters, and extending its capabilities, refer to the [Wiki](https://github.com/your-username/noc-simulator/wiki).

## Contributing

We welcome contributions to enhance the simulator. Please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -am 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgements

Special thanks to all the contributors and the open-source community for their invaluable support and contributions.

---

This README provides a comprehensive guide for users interested in using the High-Level Network-On-Chip Simulator for their NoC modeling needs. By focusing on flexibility and high-level modeling capabilities, the simulator is equipped to handle a wide range of network configurations and parameters.
