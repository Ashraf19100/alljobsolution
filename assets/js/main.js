$(document).ready(function ($) {
	//meanmenu
	$("#navbar nav").meanmenu();
	  
	  $(".slider-area").owlCarousel({
		autoWidth: false,
		margin:10,
		items: 1,
		loop: true,
		nav: false,
		dots: true,
		autoplay: true,
		autoplayTimeout:2800,
		responsive: {
		  0: {
			items: 1,
		  },
		  767: {
			items: 1,
		  },
		  1024: {
			items: 1,
		  },
		},
	  });
	  $(".brand-area").owlCarousel({
		autoWidth: false,
		margin:2,
		items: 5,
		loop: true,
		nav: true,
		dots: false,
		autoplay: true,
		autoplayTimeout:1200,
		navText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
		mouseDrag: true,
		responsive: {
		  0: {
			items: 1,
		  },
		  767: {
			items: 3,
		  },
		  1024: {
			items: 7,
		  },
		},
	  });
	//jQuery Sticky Area
	  $(".sticky-area").sticky({
		topSpacing: 0,
	  });
      
});
//product show js
const product = {
	all_category: [
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/VolumeBoster.jpg", title: " Volume Boster ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/SolenoidValve.jpeg", title: " Solenoid Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/ProfessionalValve.jpg", title: " Professional Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/RoundAirCylinder.jpeg", title: "Round Air Cylinder  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/PressureReliefValve.jpeg", title: " Pressure Relief Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/PressureReducingRegulator.jpg", title: " Pressure Reducing Regulator ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/PneumaticFittings.jpg", title: "Pneumatic Fittings  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/FlowValve.jpg", title: " Flow Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/FlowControlValve.jpeg", title: " Flow Control Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/turbine-flow-meter.jpg", title: " turbine-flow-meter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/UltrasonicFlowmeter.jpeg", title: " UltrasonicFlowmeter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/VortexFlowmeter.jpeg", title: " VortexFlowmeter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/Thermocouple.jpeg", title: " Thermocouple ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/TemperatureTransducer.jpeg", title: " Temperature Transducer ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/RadarLevelTransmitter.jpeg", title: " Radar Level Transmitter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/Pt100Sensor.jpg", title: " Pt100 Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/VisionSensor.jpeg", title: " Vision Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/SolidStatRelay.jpeg", title: " SolidStatRelay ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/Throughbeamsensor.jpeg", title: " Throughbeamsensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ResignationSensor.webp", title: " Resignation Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ResignationSensor.avif", title: " Resignation Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ReflectiveSensor.jpeg", title: " Reflective Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/PressureSensor.webp", title: " Pressure Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/PhotomicroSensor.jpg", title: " Photomicro Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/CentrifugalPump.jpeg", title: " Centrifugal Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/ChemicalProcessPump.jpeg", title: " Chemical Process Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/Coupling.webp", title: " Coupling ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/DosingPump.jpeg", title: " DosingPump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/ElectricalSubmersiblePump.avif", title: " Electrical Submersible Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/GearPump.webp", title: " Gear Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/VerticalVolutePump.jpeg", title: " Vertical Volute Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/VerticalSumpPump.jpg", title: " Vertical Sump Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/IncrementalEncoder.jpg", title: "Incremental Encoder", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/MagneticRotaryEncoder.webp", title: "Magnetic Rotary Encoder", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/MotionRadarSensor.jpg", title: "MotionRadarSensor", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Absolute_Rotary _Encoder.jpeg", title: " Absolute_Rotary ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Analog_Timer.jpeg", title: "  Analog_Timer", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/abc-CPU.jpg", title: " abc-CPU ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/D-A_Input_Module.jpg", title: " D-A_Input_Module ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/D-A_Output _Module.webp", title: " D-A_Output _Module ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Digital Timer.jpg", title: "Digital Timer  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Digital_Counter.webp", title: "  Digital_Counter", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/HumanMachineInterface(HMI).jpeg", title: " Human Machine Interface ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/PressureSwitch.jpg", title: " Pressure Switch ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/ProgrammableLogicController(PLC).jpg", title: " Programmable LogicController ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/VerticalTurbinePump.jpeg", title: " Vertical Turbine Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/VCB.jpeg", title: " VCB ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ThermalOverLoadRelay.jpeg", title: " Thermal Over Load Relay ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ThermalImager.jpeg", title: " Thermal Imager ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ThermalGun.jpeg", title: " Thermal Gun ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/SoftStarter.png", title: " Soft Starter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/SelectorSwitch.jpeg", title: " Selector Switch ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ResistanceTester.jpeg", title: "Resistance Tester ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/PushButtonSwitch.jpg", title: " Push Button Switch ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/RCCB.jpeg", title: " RCCB ", description: "  Boost efficiency with our products!" }
		
	],
	Automation_control: [
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/IncrementalEncoder.jpg", title: "Incremental Encoder", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/MagneticRotaryEncoder.webp", title: "Magnetic Rotary Encoder", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/MotionRadarSensor.jpg", title: "MotionRadarSensor", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Absolute_Rotary _Encoder.jpeg", title: " Absolute_Rotary ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Analog_Timer.jpeg", title: "  Analog_Timer", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/abc-CPU.jpg", title: " abc-CPU ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/D-A_Input_Module.jpg", title: " D-A_Input_Module ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/D-A_Output _Module.webp", title: " D-A_Output _Module ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Digital Timer.jpg", title: "Digital Timer  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Digital_Counter.webp", title: "  Digital_Counter", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/HumanMachineInterface(HMI).jpeg", title: " Human Machine Interface ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/PressureSwitch.jpg", title: " Pressure Switch ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/ProgrammableLogicController(PLC).jpg", title: " Programmable LogicController ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/Relaywithbase.jpg", title: " Relay with base ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/variableFrequencyDrive(VFD).webp", title: " variable Frequency Drive ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/SafetyModule.jpeg", title: " Safety Module ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/ServoMotor.jpeg", title: " Servo Motor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/SignalConverter.jpeg", title: " Signal Converter", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/TemperatureController.jpeg", title: " Temperature Controller", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Automation&Control_System/UltrasonicSensor.jpg", title: " UltrasonicSensor ", description: "  Boost efficiency with our products!" }
		
	],
	pump_motor: [
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/CentrifugalPump.jpeg", title: " Centrifugal Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/ChemicalProcessPump.jpeg", title: " Chemical Process Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/Coupling.webp", title: " Coupling ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/DosingPump.jpeg", title: " DosingPump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/ElectricalSubmersiblePump.avif", title: " Electrical Submersible Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/GearPump.webp", title: " Gear Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/VerticalVolutePump.jpeg", title: " Vertical Volute Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/VerticalSumpPump.jpg", title: " Vertical Sump Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/VerticalExtractionPump.jpg", title: "Vertical Extraction Pump  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/NHChemicalProcessPump.jpeg", title: " NHChemical Process Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/MultistagePump.jpg", title: " Multistage Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/MultiphasePump.jpeg", title: " Multiphase Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/MagneticDrivePump.jpeg", title: " Magnetic Drive Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/In-LinePump.jpg", title: " In-Line Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/HorizontalSplitcasePump.png", title: " Horizontal Splitcase Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Pump&Motor/AMMagneticDrivePump.jpeg", title: " AM MagneticDrive Pump ", description: "  Boost efficiency with our products!" }
		
	],
	sensors: [
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/VisionSensor.jpeg", title: " Vision Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/SolidStatRelay.jpeg", title: " SolidStatRelay ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/Throughbeamsensor.jpeg", title: " Throughbeamsensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ResignationSensor.webp", title: " Resignation Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ResignationSensor.avif", title: " Resignation Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ReflectiveSensor.jpeg", title: " Reflective Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/PressureSensor.webp", title: " Pressure Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/PhotomicroSensor.jpg", title: " Photomicro Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/PhotoelectricSensor.jpg", title: " Photo electricSensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/MagneticProximitySensor.webp", title: " Magnetic Proximity Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/LimitSwitch.jpg", title: " Limit Switch ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/InductiveProximitySensor.jpeg", title: " Inductive Proximity Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/FlowSensor.jpeg", title: " Flow Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/FiverOpticSensor.jpg", title: " Fiver Optic Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/DisplacementSensor.jpg", title: " Displacement Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ContactSensor.jpg", title: " Contact Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ConductiveSensor.webp", title: " Conductive Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/ConductionMonitoringSensor.jpg", title: " Conduction Monitoring Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Industrial_Sensors/CapacitiveProximitySensor.jpeg", title: " Capacitive Proximity Sensor ", description: "  Boost efficiency with our products!" }
	],
	instromentattion: [
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/turbine-flow-meter.jpg", title: " turbine-flow-meter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/UltrasonicFlowmeter.jpeg", title: " UltrasonicFlowmeter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/VortexFlowmeter.jpeg", title: " VortexFlowmeter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/Thermocouple.jpeg", title: " Thermocouple ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/TemperatureTransducer.jpeg", title: " Temperature Transducer ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/RadarLevelTransmitter.jpeg", title: " Radar Level Transmitter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/Pt100Sensor.jpg", title: " Pt100 Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/PressureTransmitter.jpeg", title: " Pressure Transmitter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/PressureGouge.jpeg", title: " Pressure Gouge ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/PhSensor.jpeg", title: " Ph Sensor ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/PaddleLevelSwitch.jpeg", title: " Paddle Level Switch ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/LiquidAnalysis.jpeg", title: " Liquid Analysis ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/LevelTransmitter.jpeg", title: " Level Transmitter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/HydrostaticTransmitter.jpg", title: " Hydrostatic Transmitter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/ElectromagneticFlow Meter.jpeg", title: " Electro magnetic Flow ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Instromentattion/DifferentialTransmitter.jpeg", title: " Differential Transmitter ", description: "  Boost efficiency with our products!" }
	],
	pnuematic: [
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/VolumeBoster.jpg", title: " Volume Boster ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/SolenoidValve.jpeg", title: " Solenoid Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/ProfessionalValve.jpg", title: " Professional Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/RoundAirCylinder.jpeg", title: "Round Air Cylinder  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/PressureReliefValve.jpeg", title: " Pressure Relief Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/PressureReducingRegulator.jpg", title: " Pressure Reducing Regulator ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/PneumaticFittings.jpg", title: "Pneumatic Fittings  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/FlowValve.jpg", title: " Flow Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/FlowControlValve.jpeg", title: " Flow Control Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/FilterElement.jpg", title: " Filter Element ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/EPPositioner.jpeg", title: " EP Positioner ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/CompactCylinder.jpeg", title: " Compact Cylinder ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/CheckValve.jpeg", title: " Check Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/ButterflyValve.jpeg", title: " Butterfly Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/BurnerControl.jpeg", title: " Burner Control ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/BaseValve.jpg", title: " Base Valve ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/BallValve.jpg", title: "Ball Valve  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/AirFilterRegulator.jpeg", title: "Air Filter Regulator  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/AirProfileCylinder.jpeg", title: " Air Profile Cylinder ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Pnuematic/Actuator.jpeg", title: " Actuator ", description: "  Boost efficiency with our products!" }
	],
	swicthgear_measuring: [
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ACB.jpeg", title: " ACB  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ACBClose&TripCoil.webp", title: " ACB Close & Trip Coil", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/Barometer.jpeg", title: " Barometer ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/CableTray.jpeg", title: " CableTray ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ClampMeter.jpeg", title: " ClampMeter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/DigitalMultimeter.jpeg", title: " Digital Multimeter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/DOLStarter.jpeg", title: "DOL Starter  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/Enclosure&JunctionBox.png", title: " Enclosure & JunctionBox ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/images.jpeg", title: " Switch gear ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/LeakDetector.png", title: " Leak Detector ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/LightiingArrestors.jpeg", title: " Lightiing Arrestors ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/MC.png", title: " MC ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/MCB.jpeg", title: " MCB ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/MCCB.jpg", title: "MCCB  ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/MPCB.jpeg", title: " MPCB ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/OilTester.jpeg", title: " Oil Tester ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/PanelBox.webp", title: " Panel Box ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/PowerAnalyzer.jpeg", title: " Power Analyzer ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/VerticalTurbinePump.jpeg", title: " Vertical Turbine Pump ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/VCB.jpeg", title: " VCB ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ThermalOverLoadRelay.jpeg", title: " Thermal Over Load Relay ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ThermalImager.jpeg", title: " Thermal Imager ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ThermalGun.jpeg", title: " Thermal Gun ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/SoftStarter.png", title: " Soft Starter ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/SelectorSwitch.jpeg", title: " Selector Switch ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/ResistanceTester.jpeg", title: "Resistance Tester ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/PushButtonSwitch.jpg", title: " Push Button Switch ", description: "  Boost efficiency with our products!" },
		{ img: "assets/img/WEBSITE/Product_Picture/Switchgear&Measuring/RCCB.jpeg", title: " RCCB ", description: "  Boost efficiency with our products!" }
	]
};

function loadProduct() {
	const params = new URLSearchParams(window.location.search);
	const category = params.get("category") || "all_category";
	const container = document.getElementById("products-container");
	container.innerHTML = "";
	
	if (product[category]) {
		product[category].forEach(product => {
			const card = `
				<div class="col-md-3">
            		<div class="product_card">
						<div class="product_img d-flex align-item-center justify-content-center">
							<img src="${product.img}" alt="${product.title}">
						</div>
						<div class="product_details text-center">
							<h3>${product.title}</h3>
							<p>${product.description}</p>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						

            		</div>
        		</div>
			`;
			container.innerHTML += card;
		});
	}
}