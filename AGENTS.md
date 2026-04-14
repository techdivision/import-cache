# AGENTS.md - import-cache

## Zweck & Verantwortung

Das `import-cache` Modul definiert die **Schnittstellen und Verträge** für alle Cache-Funktionalität im Pacemaker Import-System. Es ist ein **Tier 0 Modul** ohne externe TechDivision-Abhängigkeiten und dient als Basis für konkrete Cache-Implementierungen.

**Hauptverantwortung:**
- Definition von Cache-Interfaces (`CachePoolFactoryInterface`, `CacheAdapterInterface`)
- Standardisierung von Cache-Verträgen für alle Import-Operationen
- Ermöglichung austauschbarer Cache-Implementierungen (In-Memory, Redis, etc.)

## Architektur & Design Patterns

### Interfaces (Utility Classes)
- **CachePoolFactoryInterface**: Factory für Cache-Pool-Erstellung
- **CacheAdapterInterface**: Abstraktion für Cache-Operationen (get, set, has, remove)

### Verwendete Patterns
- **Interface-Heavy Design**: Nur Verträge, keine Implementierung
- **Factory Pattern**: Für Cache-Pool-Erstellung
- **Adapter Pattern**: Für Cache-Backend-Abstraktion

### Schichten
```
┌─────────────────────────────────┐
│ Cache Interfaces (Tier 0)       │
├─────────────────────────────────┤
│ CachePoolFactoryInterface       │
│ CacheAdapterInterface           │
└─────────────────────────────────┘
         ↓ (implementiert von)
┌─────────────────────────────────┐
│ Tier 1 Implementierungen        │
├─────────────────────────────────┤
│ import-cache-collection         │
│ (custom implementations)        │
└─────────────────────────────────┘
```

## Abhängigkeiten

### Externe Pakete
- **Keine** - Tier 0 Modul mit reinen Interfaces

### TechDivision Dependencies
- **Keine** - Basis-Modul ohne interne Dependencies

### Abhängig von diesem Modul (5 Reverse Dependencies)
1. **import** - Core Framework nutzt Cache-Interfaces
2. **import-cache-collection** - Implementiert Cache-Adapter
3. **import-dbal** - Nutzt Cache für DBAL-Operationen
4. **import-dbal-collection** - Nutzt Cache-Interfaces
5. **import-cli-simple** - Transitiv über andere Module

## Wichtige Entry Points

### Interfaces
```php
// Cache Pool Factory
CachePoolFactoryInterface::create(): CachePoolInterface

// Cache Adapter
CacheAdapterInterface::get($key): mixed
CacheAdapterInterface::set($key, $value): void
CacheAdapterInterface::has($key): bool
CacheAdapterInterface::remove($key): void
```

### Verwendungsbeispiel
```php
// In anderen Modulen
$cacheAdapter = $cachePoolFactory->create();
$value = $cacheAdapter->get('product_123');
if (!$cacheAdapter->has('product_123')) {
    $cacheAdapter->set('product_123', $productData);
}
```

## Events & Extension Points

**Keine Events** - Tier 0 Modul mit reinen Interfaces

## Hints für KI-Agenten

### Wichtig zu verstehen
1. **Tier 0 Modul**: Definiert nur Verträge, keine Implementierung
2. **Austauschbarkeit**: Jede Cache-Implementierung kann `CacheAdapterInterface` implementieren
3. **Keine Logik**: Nur Interface-Definitionen, keine Business Logic
4. **Breite Verwendung**: Wird von 5 anderen Modulen direkt genutzt

### Bei Änderungen
- **Interface-Änderungen sind Breaking Changes** - Alle Implementierungen müssen angepasst werden
- **Neue Methoden**: Müssen in allen Implementierungen hinzugefügt werden
- **Vorsicht**: Dieses Modul ist Basis für viele andere Module

### Implementierungs-Hinweise
- Nutze `CacheAdapterInterface` für neue Cache-Implementierungen
- Implementiere `CachePoolFactoryInterface` für Factory-Logik
- Beachte PSR-6 Cache-Standards für Kompatibilität

## Häufige Use Cases

### Cache-Nutzungs-Muster
```php
// Standard Cache-Operationen
$cacheAdapter = $cachePoolFactory->create();
$value = $cacheAdapter->get('product_123');
if (!$cacheAdapter->has('product_456')) {
    $cacheAdapter->set('product_456', $productData);
}
$cacheAdapter->remove('product_789');
```

### Szenarien
1. **Product-SKU Caching**: Schnelle SKU→ID Lookups
2. **Configuration Caching**: Konfiguration für Performance cacen
3. **Multi-Backend Support**: Redis, Memcached, File, In-Memory

## Performance-Überlegungen

- **Interface-Overhead**: Minimal - nur polymorphic dispatch
- **Backend-abhängig**: Performance hängt von Tier 1 Implementierung ab
- **Hit-Rate**: Mit Caching können 70-90% der Lookups aus Cache erfolgen (~1-2ms statt 5-10ms DB)
- **TTL-Management**: Cache-Invalidation ist kritisch - falsche TTLs = stale data
- **Optimal für**: Product-SKUs, Attribute-Codes, Category-Paths

## Verwandte Module

- **import-cache-collection**: Implementiert In-Memory Cache
- **import-dbal**: Nutzt Cache für DBAL-Lookups
- **import-dbal-collection**: Nutzt Cache-Integration
- **import**: Core Framework nutzt Cache
- **import-cache** ← **diese Datei** (nur Interfaces!)

## Troubleshooting & FAQ

**Q: Wo sind die Cache-Implementierungen?**
- A: In `import-cache-collection` für In-Memory. Für Redis: custom Implementierung.

**Q: Kann ich mehrere Cache-Backends kombinieren?**
- A: Ja! Implementiere eigene Adapter die mehrere Backends delegieren (z.B. L1: Memory, L2: Redis).

**Q: Cache-Keys kollidieren**
- A: Nutze `namespace` Prefix in Keys: `'product_' . $sku`, `'attribute_' . $code`

**Q: Cache wird nicht invalidiert**
- A: Manuelle Invalidierung nötig! Kein Auto-Invalidation bei Updates.

## Bekannte Einschränkungen

- **Nur Interfaces**: Keine konkrete Implementierung enthalten
- **Keine Konfiguration**: Konfiguration erfolgt in Implementierungs-Modulen
- **Keine Logging**: Logging erfolgt in Implementierungen

## Zusammenfassung

`import-cache` ist ein **minimales, fokussiertes Tier 0 Modul**, das die Grundlage für alle Cache-Operationen im Pacemaker-System bildet. Es definiert klare Verträge, die es verschiedenen Cache-Backends ermöglichen, austauschbar zu sein.

**Für Agenten:** Verstehe dieses Modul als **Schnittstellen-Definition**, nicht als Implementierung. Alle Cache-Operationen in anderen Modulen nutzen diese Interfaces.
